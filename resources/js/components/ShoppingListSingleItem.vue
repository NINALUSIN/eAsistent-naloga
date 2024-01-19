<template>

    <div class="card-stacked" >
        <div class="card-content shopping-list-card-content">
            <div class="row shopping-list-card-content-row">
                <div v-if="user_id > 0" class="col s1 l1">
                    <label
                    v-show="!inEditMode">
                        <input
                        type="checkbox"
                        :true-value="1"
                        :false-value="0"
                        v-model="shopping_list_item.completed"
                        @change="updateShoppingListItem()"
                        />
                        <span></span>
                    </label>

                </div>
                <div
                id="shoppingListItemText"
                class="col s11 l9"

                >
                    <div
                    v-show="inEditMode"
                    class="input-field col s12">
                        <textarea
                            id="shoppingListTextEdit"
                            type="text"
                            maxLength="128"
                            class="materialize-textarea"
                            v-model="shopping_list_item.text"
                        >
                        </textarea>

                    </div>

                    <div
                    v-show="!inEditMode"
                    class="col s12 shopping-list-item-text"
                    :class="{ shopping_list_done: shopping_list_item.completed }"
                    >
                        {{ shopping_list_item.text }}
                    </div>

                </div>
                <div v-if="user_id > 0"class="col s5 l1 center-align" >

                    <a
                    v-show="!inEditMode"
                    class="waves-effect waves-light btn blue darken-3"
                    @click="toggleEditMode()"
                    >
                        <i class="material-icons">edit</i>
                    </a>

                    <a
                    v-show="inEditMode"
                    class="waves-effect waves-light btn green darken-2"
                    @click="confirmEdit()"
                    >
                        <i class="material-icons">check_box</i>
                    </a>

                </div>
                <div v-if="user_id > 0" class="col s5 l1 center-align">
                    <a
                    v-show="!inEditMode"
                    class="waves-effect waves-light btn red darken-1"
                    @click="deleteShoppingListItem()"
                    >
                        <i class="material-icons">delete_forever</i>
                    </a>
                </div>
            </div>
        </div>

        <div class="card-action shopping-list-action">
            <div class="row shopping-list-action-row">
                <div class="col s12 l4">
                    <b>Avtor:</b> {{ shopping_list_item.email }}
                </div>
                <div class="col s12 l4">
                    <b>Vneseno:</b> {{ shopping_list_item.created_at }}
                </div>
                <div class="col s12 l4">
                    <b>Spremenjeno:</b> {{ shopping_list_item.updated_at }}
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        props: ['shopping_list_item'],
        data() {
            return {
                user_id: [],
                inEditMode: false
            }
        },
        mounted() {
            this.fetchUserId()
        },
        methods: {
            fetchUserId() {
                this.user_id = document.querySelector("meta[name='user-id']").getAttribute('content');
            },
            toggleEditMode() {
                this.inEditMode = !this.inEditMode;
            },
            confirmEdit(){
                this.updateShoppingListItem();
                this.toggleEditMode();
            },
            updateShoppingListItem(){
                axios.put(
                    'api/shopping_list_item/'+this.shopping_list_item.shopping_list_id ,
                    {
                        shopping_list_item: this.shopping_list_item
                    }
                )
                .then(response => {
                        if(response.status = 200){
                            this.$emit('shoppingItemChanged')
                        }
                    }
                )
                .catch( error => {
                    console.log(error)
                })


            },
            deleteShoppingListItem(){
                axios.delete(
                    'api/shopping_list_item/'+this.shopping_list_item.shopping_list_id
                )
                .then( response => {
                    if(response.status = 200){
                            this.$emit('shoppingItemChanged')
                        }
                })
                .catch( error => {
                    console.log(error)
                })
            }
        }
    }
</script>
