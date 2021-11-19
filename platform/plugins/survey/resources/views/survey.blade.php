@if (($survey))
<div id="surveyModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{$survey->name}}<img width="50"
                src="https://staging.jusoor.co/storage/general/logo-light-jusoor.png"
                        alt="Nedaa Post logo"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="survey-form">
                <div class="modal-body">
                    <input type="hidden" name="id" id="survey_id" value="{{$survey->id}}">
                    <fieldset>
                        <br>
                        <h4 id="dropdown-label">{{$survey->question}}</h4>
                        <span class="form-group checker">
                        <input id="definitely" type="radio" name="answer" value="{{$survey->option_1}}">
                        <label for="definitely">{{$survey->option_1}}</label>
                        </span> <br>
                        <span class="form-group checker">
                        <input id="maybe" type="radio" name="answer" value="{{$survey->option_2}}">
                        <label for="maybe">{{$survey->option_2}}</label>
                        </span> <br>
                        <span class="form-group checker">
                        <input id="not" type="radio" name="answer" value="{{$survey->option_3}}">
                        <label for="not">{{$survey->option_3}}</label>
                        </span> <br>
                                <span class="form-group checker">
                        <input id="not" type="radio" name="answer" value="{{$survey->option_4}}">
                        <label for="not">{{$survey->option_4}}</label>
                        </span> <br>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('الغاء')}}</button>
                    <button type="button" class="btn btn-primary" id="survey-btn">{{__('حفظ')}}</button>
                </div>
            </form>
            <div id="survey-success-message"><h3 class="msg">{{__('شكرا لك على المشاركة في الاستبيان')}}</h3></div>
        </div>
    </div>
</div>

@endif
