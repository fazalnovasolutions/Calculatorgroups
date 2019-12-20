@if(!empty($data))
<div class="calculated-data {{$data["areas"]}}" id="row_{{$data["areas"]}}">
    <div class="delete-btn" >
        <button type="button" class="delete-row dlt_{{$data["areas"]}}" id="{{$data["areas"]}}">x</button>
    </div>
    <div class="area-number details">
        <h5 id="area_text_{{$data["areas"]}}">Area {{$data["area_num"]}}</h5>
    </div>
    <div class="details">
        <h4> {{$data["cal_length"]}} {{$data["length_unit"]}}</h4>
    </div>
    <div class="details">
        <h4> {{$data["width"]}} {{$data["width_unit"]}}</h4>
    </div>
    <div class="details">
        <h4> {{$data["area"]}} m</h4><span>2</span>
    </div>
    <input type="hidden" name="area_lenght[]" value="{{$data["cal_length"]}}">
    <input type="hidden" name="area_lenght_unit[]" value="{{$data["length_unit"]}}">
    <input type="hidden" name="area_width[]" value="{{$data["width"]}}">
    <input type="hidden" name="area_width_unit[]" value="{{$data["width_unit"]}}">
    <input type="hidden" class="calcult-area" name="area[]" id="area_{{$data["areas"]}}" value="{{$data["area"]}}">
    <input type="hidden" name="area_calculator[]" value="{{$data["calculator"]}}">

</div>
    @endif
