@extends('client.layout')
@section('title', 'Dịch vụ')
@section('content')
    <main>
        <div class="service">
            <div class="service_title">
                <h1><span>Dịch vụ</span></h1>
            </div>
            <div class="box-service">
                <div class="container">
                    <div class="row" id="service">
                        <div class="col-md-6 col-lg-4  mb-4" v-for="(item, index) in items" :key="index">
                            <div class="h-100 d-flex flex-column justify-content-between list-news_items blogs_m">
                                <div class="list_news_item_img blogs_i">
                                    <a :href="servicesDetailRoute.replace(':slug', item.slug)">
                                        <img class="lazy" :data-src="'{{ url('') }}' + '/' + item.image"
                                            :src="'{{ url('') }}' + '/' + item.image" :alt="item.title">
                                    </a>
                                </div>
                                <a class="mb-auto" :href="servicesDetailRoute.replace(':slug', item.slug)">
                                    <h3 class="title">@{{ item.title }}</h3>
                                </a>
                                <p class="webkit-box-3 box-intro-news">
                                    @{{ formatDescription[index] }}
                                </p>
                                <div class="">
                                    <a class="btn__link blog_news_link"
                                        :href="servicesDetailRoute.replace(':slug', item.slug)">
                                        <span>Chi Tiết</span>
                                        <i class="flaticon-right-arrow icon-arrow-right">
                                        </i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script>
        var app = new Vue({
            el: '#service',
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
                        return item.desc.slice(0, 100) + '...';
                    });
                }
            },
        });
    </script>
@endsection
