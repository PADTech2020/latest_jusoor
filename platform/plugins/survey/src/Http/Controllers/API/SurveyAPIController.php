<?php

namespace Botble\Survey\Http\Controllers\API;

use Botble\AwRequest\Models\AwRequest;
use Botble\AwRequest\Models\AwRequestCircuits;
use Botble\AwRequest\Models\AwRequestPR;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Enums\BaseStatusRequest;
use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Blog\Models\Assets;
use Botble\Blog\Models\AssetsCaption;
use Botble\Ecommerce\Http\Requests\CircuitRequest;
use Botble\Ecommerce\Models\Circuit;
use Botble\Ecommerce\Models\CircuitCategory;
use Botble\Ecommerce\Models\CustomerCircuit;
use Botble\Ecommerce\Repositories\Interfaces\CircuitInterface;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Media\Models\MediaFile;
use Botble\Survey\Models\SurveyResult;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Exception;
use Botble\Ecommerce\Tables\CircuitTable;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Ecommerce\Forms\CircuitForm;
use Botble\Base\Forms\FormBuilder;
use Botble\Blog\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use EmailHandler;
use Botble\Ecommerce\Models\Customer;
use Botble\Slug\Models\Slug;
use Route;
use RvMedia;

class SurveyAPIController extends BaseController
{



    public function submitSurvey(Request $request, BaseHttpResponse $response)
    {
        $id = $request->get('id');
        $answer = $request->get('answer');
        if ($id &&  $answer) {
            $model=new SurveyResult();
            $model->survey_id=$id;
            $model->answer=$answer;
            if($model->save())
            return Response::json([
                'status' => 'success',
                'id' => $id,

            ]);
        }
    }




}
