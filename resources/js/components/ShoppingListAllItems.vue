<template>
    <div v-for="shopping_list_item in shopping_list_items" class="card horizontal" :data-id="shopping_list_item.shopping_list_id" >
        <shopping-list-single-item
            :shopping_list_item="shopping_list_item"
            v-on:shoppingItemChanged="$emit('reloadShoppingList')"
            ></shopping-list-single-item>
    </div>
</template>

<script>
    export default {
        props: ['shopping_list_items']
    }
</script>
