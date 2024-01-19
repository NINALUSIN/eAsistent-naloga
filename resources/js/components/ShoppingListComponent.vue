<template>
    <h4>Nakupovalni listek</h4>


    <div v-if="user_id == -1" class="row">
        <div class="col s12">
            <div class="card blue lighten-4">
                <div class="card-content ">
                    <span class="card-title">Niste prijavljeni</span>
                        <p class="mb-0">Za urejanje nakupovalnega listka, se morate <a href="/login">prijaviti</a> v aplikacijo.</p>
                </div>
            </div>
        </div>
    </div>

    <shopping-list-add-item
        v-on:reloadShoppingList="getShoppingListAllItems()"
    >
    </shopping-list-add-item>

    <shopping-list-all-items
        :shopping_list_items="shopping_list_items"
        v-on:reloadShoppingList="getShoppingListAllItems()"
    >
    </shopping-list-all-items>



</template>

<script>
    export default {
        data() {
            return {
                user_id: [],
                shopping_list_items: []
            }
        },
        mounted() {
            this.fetchUserId()
        },
        created(){
            this.getShoppingListAllItems();
        },
        methods: {
            fetchUserId() {
                this.user_id = document.querySelector("meta[name='user-id']").getAttribute('content');
            },
            getShoppingListAllItems(){
                axios.get('api/shopping_list_items')
                .then(
                    response => {
                        this.shopping_list_items = response.data
                    }
                )
                .catch(
                    error => {
                        console.log(error);
                    }
                )
            }
        }
    }
</script>
