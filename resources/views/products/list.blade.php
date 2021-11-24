<div class="row mb-3">
        @foreach($products as $product)
            <div class="ais-hits--item col-lg-6 col-xl-4 mb-3">
                <div class="card h-100">
                    <a href="{{ route('products.show', ['productId' => $product['id']]) }}" class="card-body">
                        <h5 class="card-title mt-0">
                            <b>{{ $product['title'] }}</b>
                            <br>
                        </h5>
                        <div>
                            <div>
                                By:
                                @foreach($product['authors'] as $author)
                                    <p> {{ $author }}</p>
                                @endforeach
                            </div>
                            <div>
                                <p>Publication Date: {{ date('Y-m-d', strtotime($product['publication_date'])) }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
</div>
<div class="">
    {{ $products->onEachSide(5)->links('pagination::bootstrap-4') }}
</div>

