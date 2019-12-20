<div class="calculators">
    <div >
        <h4> Calculators</h4>
        @foreach($calculators as $calculator)
            <div class="grp-cal">
                <div class="">
                    <input type="radio"  id="cal_{{$calculator->id}}" name="CalCusRadio" class="calculator">
                    <label class="cal_{{$calculator->id}}" for="cal_{{$calculator->id}}"><a class="cl-title">@if(!empty($group)){{$group->title}} -@endif {{$calculator->title}}</a></label>
                    <span id="icon_cal_{{$calculator->id}}" class="icons"></span>
                </div>

            </div>
        @endforeach
    </div>

</div>
