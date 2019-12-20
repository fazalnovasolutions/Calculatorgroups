<div class="calculator-detail">
    <div >
        @foreach($calculators as $calculator)
            <div class="single-cal">
                    <input type="radio"   id="cal_{{$calculator->id}}" name="CalCusRadio" checked class="calculator ">
                    <label class="cal_{{$calculator->id}}" for="cal_{{$calculator->id}}"><a class="cl-title">{{$calculator->title}}</a></label>
            </div>
        @endforeach
    </div>
    <div class="calculations">
        <div class="cal-title">
            <p>
                In order to calculate the <strong><span id="cal_title"> {{$calculator->title}}</span> </strong> materials you require please add the length and width
                for each section that requires soundproofing. You can input these measurements in metric or
                imperial and the area calculator will automatically work out your soundproofing area in square meters.
            </p>
            <div class="main-error">
                <h6 class="error" id="error"></h6>
            </div>
        </div>


        <div class="text-enter" >

            <div class="enter-sections">
                <div class="length-div" >
                    <label for="length" class="unit-labl" id="lnth-labl">Length:</label>
                    <input type="number" name="length" id="length" class="unit-data">
                    <select id="length_unit" name="length_unit" class="unit">
                        <option value="m">m</option>
                        <option value="cm">cm</option>
                        <option value="ins">ins</option>
                        <option value="ft">ft</option>
                    </select>
                </div>
            </div>

            <div class="enter-sections">
                <div class="width-div" >
                    <label for="width" class="unit-labl" id="width-labl">Width:</label>
                    <input type="number" name="width" id="width" class="unit-data">
                    <select id="width_unit" name="width_unit" class="unit">
                        <option value="m">m</option>
                        <option value="cm">cm</option>
                        <option value="ins">ins</option>
                        <option value="ft">ft</option>
                    </select>
                </div>
            </div>
            <div class="add-div">
                <button class="add-calculation" id="add-calculation">Add</button>
            </div>

        </div>

        <form method="POST" action="save/calculations" id="calculations_save">
            @csrf

            <div class="calculation_result" id="calculation_result">
                <div class="cal-heading" >
                    <div class=""></div>
                    <div class="headings ">

                    </div>
                    <div class="headings ">
                        <h6>Length</h6>
                    </div>
                    <div class="headings ">
                        <h6>Width</h6>

                    </div>
                    <div class="headings ">
                        <h6>Area</h6>

                    </div>
                </div>

                <input type="hidden" name="areas" id="areas" >
                <input type="hidden" name="total-area" id="total-area" >
                <div class="cal-data">

                </div>

                <div class="cal-footer" style="border-top: 1px solid rgba(0,0,0,.1);padding: 20px 5px;">

                    <div class="clear-areas">
                        <button class="clear-btn">Clear All</button>
                    </div>
                    <div class="cal-area-lbl" >
                        <h6>Soundprofing Area:</h6>
                    </div>
                    <div class="cal-div">
                        <h4 class="cla-area">  0 m</h4>  <span>2</span>
                    </div>

                </div>
            </div>
            <div class="calculate">
                <button class="btn-calculate" type="submit">
                    Calculate
                </button>

            </div>
        </form>
    </div>


</div>
