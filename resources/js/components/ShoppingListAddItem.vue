<template>
    <div v-if="user_id > 0" class="col s1 l1">
        <div class="row">
            <div class="input-field col s9 m10">
                <textarea
                    id="shoppingListText"
                    type="text"
                    maxLength="128"
                    class="materialize-textarea"
                    v-model="shopping_list_item.text"
                >
                </textarea>
                <label for="shoppingListText">Vnesi nov artikel</label>
            </div>
            <div class="input-field col s2 m2">
                <button class="btn waves-effect waves-light"
                    :class="[ shopping_list_item.text ? '' : 'disabled' ]"
                    @click="addShoppingListItem()"
                    type="submit"
                    name="action">
                    Shrani
                    <i class="material-icons right">send</i>
                </button>
            </div>
            <div class="input-field col s1 m0">
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        data: function() {
            return {
                shopping_list_item: {
                    text: ""
                },
                user_id: []
            }
        },
        mounted() {
            this.fetchUserId()
        },
        methods: {
            fetchUserId() {
                this.user_id = document.querySelector("meta[name='user-id']").getAttribute('content');
            },
            addShoppingListItem(){
                if(this.shopping_list_item.text == ''){
                    return;
                }

                this.shopping_list_item.user_id = document.querySelector("meta[name='user-id']").getAttribute('content');

                axios.post('api/shopping_list_item/store',
                    {
                        shopping_list_item: this.shopping_list_item
                    })
                    .then( response => {
                        if(response.status == 201){
                            this.shopping_list_item.text = "";
                            this.$emit('reloadShoppingList');
                        }
                    })
                    .catch( error => {
                        console.log(error);
                    });
            }


        }
    }
</script>
