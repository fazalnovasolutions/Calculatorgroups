<div >
    <h4> Group</h4>

        @if(!empty($group))
        <div class="cal-group" >
            <div class="custom-control custom-radio">
                <input type="radio"  id="{{$group->id}}" name="customRadio" class="custom-control-input groups">
                <label class="custom-control-label" for="{{$group->id}}">{{$group->title}}</label>
            </div>
        </div>
        @endif
</div>
