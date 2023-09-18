<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<script>
    var app = new Vue({
        el: '#service', // ID của phần tử HTML chứa ứng dụng Vue
        data: {
            items: [],
            servicesDetailRoute: @json(route('client.services.detail', ['slug' => ':slug']))

        },
        mounted() {
            // data from backend
            this.items = {!! json_encode($services) !!};
        },
        computed: {
            formatDescription: function() {
                return this.items.map(function(item) {
                    return item.desc.substring(0, 22) + (item.desc.length > 22 ? '...' : '');
                });
            }
        },
    });
</script>
