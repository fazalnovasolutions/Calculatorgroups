@if(!empty($variants))
    <div class="Solution_calculator" id="sol_head">
        <h3> Solution Calculator</h3>
        <p >
            We calculate you require the following materials to soundproof a area of <b>{{$total_area}}</b> m2 with <b>SM20</b>. This includes the industry standard of 10% wastage. These quantities
            may be changed after they have been added to the shopping basket, as it is possible you can reduce the wastage factor in certain circumstances.
        </p>
        <form id="addtocart" method="POST">
        <div class="solution_heading">
            <div class="heads"><h4>Title</h4></div>
            <div class="heads"><h4>Quantity</h4></div>
            <div class="heads price"><h4>Price</h4></div>
            <div class="heads price"><h4>Total Line</h4></div>
        </div>
            <input type="hidden" id="index" value="{{count($variants)}}">
        @foreach($variants as $key => $variant)
            <div class="variant">

                <div class="variant_detail">
                    <h5> {{$variant->belongs_product->title}}  {{$variant->title}}</h5>

                </div>

                <div class="variant_detail">
                    <h5>{{$quanitites[$variant->variant_id]}}</h5>
                    <input type="hidden" name="id" id="var_id_{{$key}}" class="id" value="{{$variant->variant_id}}">
                    <input type="hidden" name="quantity[]" id="var_qty_{{$key}}"class="quantity" value="{{$quanitites[$variant->variant_id]}}">

                </div>
                <div class="variant_detail price">
                    <h5> $ {{$variant->price}}</h5>

                </div>
                <div class="variant_detail price">
                    <h5> $ {{$variant->price * $quanitites[$variant->variant_id]}}</h5>
                </div>

            </div>
            @endforeach
            <div class="solution_footer">
                <div class="foot_item">
                    <h4 class="first"> <b> Total :</b></h4>
                    <h4 class="second"> $ {{$subtotal}}</h4>
                </div>
            </div>
            <div class="note">
                <p>
                   <b>Please Note:</b>  These quantities have been calculated from the information that you have provided and assume average construction types. Depending upon your
                    postcode there may be additional courier charges for some specialist items. This will be calculated when you add to basket, and enter your postcode.
                </p>
            </div>
            <div class="foot-buttons">
                <a href="#sol_head">
                    <button class="change"  type="button">
                        Change Solution
                    </button>
                </a>

                <button class="addToBasket " type="submit">
                    Add To Basket
                </button>
            </div>
        </form>
    </div>
    @endif
