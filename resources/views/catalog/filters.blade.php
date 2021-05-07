
<div class="product_filters">

    <form class="product_filters_form" method="GET" action="{{ route('catalog.category.show', ['slug' => $category->slug, 'subslug' => $subslug]) }}">
        <div class="form-group product_filters_list">

            <div class="form-check product_filters_item">
                <input name="stones" type="checkbox" value="1"
                    @foreach($addFilters as $key=>$value)
                        @if($key == 'stones') checked @endif
                    @endforeach
                    id="admin_product_item_withoutstone" class="form-check-input">
                <label for="admin_product_item_withoutstone">с камнями</label>
            </div>
            <div class="form-check product_filters_item">
                <input name="nostones" type="checkbox" value="1"
                    @foreach($addFilters as $key=>$value)
                        @if($key == 'nostones') checked @endif
                    @endforeach
                    id="admin_product_item_withoutstone" class="form-check-input">
                <label for="admin_product_item_withoutstone">без камней</label>
            </div>
            <div class="form-check product_filters_item">
                <input name="pearls" type="checkbox" value="1"
                    @foreach($addFilters as $key=>$value)
                        @if($key == 'pearls') checked @endif
                    @endforeach
                    id="admin_product_item_withoutstone" class="form-check-input">
                <label for="admin_product_item_withoutstone">с жемчугом</label>
            </div>
        </div>
        <input type="submit" class="btn" value="Применить">
        <a class="product_filters_delete" href="{{ route('catalog.category.show', ['slug' => $category->slug, 'subslug' => $subslug]) }}">Сбросить фильтры</a>
    </form>
    
</div>