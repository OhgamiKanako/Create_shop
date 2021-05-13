<div id="app">
    <h1>{{ message }}</h1>
    <h2>{{ sort_key }}</h2>
    <tr>
        <th @click="sortBy('id')">Id</th>
        <th @click="sortBy('price')">price</th>
    </tr>
</div>

<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script>
    new Vue({
        el : "#app",
        data : {
            message: "Sort Column In Table",
            users:[],
            sort_key:"",
        },
        methods: {
            sortBy(key){
                this.sort_key = key;
            }
        }
    });
</script>