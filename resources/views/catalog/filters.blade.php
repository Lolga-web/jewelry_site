
<div class="product_filters">
    <p class="product_filters_title">Фильтры:</p>
    <form class="product_filters_list" method="GET" action="{{ route('catalog.category.show', $category->slug) }}">
        <div class="form-group">

            <div class="form-check">
                <input name="stones" type="checkbox" value="1"
                    @foreach($addFilters as $key=>$value)
                        @if($key == 'stones') checked @endif
                    @endforeach
                    id="admin_product_item_withoutstone" class="form-check-input">
                <label for="admin_product_item_withoutstone">с камнями</label>
            </div>
            <div class="form-check">
                <input name="nostones" type="checkbox" value="1"
                    @foreach($addFilters as $key=>$value)
                        @if($key == 'nostones') checked @endif
                    @endforeach
                    id="admin_product_item_withoutstone" class="form-check-input">
                <label for="admin_product_item_withoutstone">без камней</label>
            </div>
            <div class="form-check">
                <input name="pearls" type="checkbox" value="1"
                    @foreach($addFilters as $key=>$value)
                        @if($key == 'pearls') checked @endif
                    @endforeach
                    id="admin_product_item_withoutstone" class="form-check-input">
                <label for="admin_product_item_withoutstone">с жемчугом</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">
            Применить
        </button> 
    </form>
    <a href="{{ route('catalog.category.show', $category->slug) }}">Сбросить фильтры</a>
</div>