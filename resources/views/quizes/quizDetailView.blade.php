
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2-materialize.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css"
      href="{{asset('vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/select.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/form-select2.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/data-tables.css')}}">
@if(isset($getData) && count($getData)>0)
<div class="section section-data-tables">
    <div class="row">
        <div class="col s12" id="quizData">
            <table id="page-length-option" class="display">
                <thead>
                    <tr>
                        <th>Grade</th>
                        <!--<th>Lesson Plan</th>-->
                        <!--<th>Course</th>-->
                        <th>Description</th>
                        <th data-orderable='false'>Quizlet</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($getData) && count($getData) > 0)
                    @foreach($getData as $getDataKey=>$getDataVal)
                    <tr>
                        <td>{{isset($getDataVal->grade)?$getDataVal->grade:''}}</td>
<!--                        <td>{{isset($getDataVal->getLessonPlan->topic_name)?$getDataVal->getLessonPlan->topic_name:''}}</td>
                        <td>{{isset($getDataVal->getCourseDetail->course_name)?$getDataVal->getCourseDetail->course_name:''}}</td>-->
                        <td style="text-align:justify;">{{isset($getDataVal->description)?$getDataVal->description:''}}</td>
                        <td>
                            <!--<a href="javascript:void(0)" target="_blank" class="waves-effect waves-light btn" style="background-color: #736cb5;">-->
                            <a href="{{url('/quizes/startQuiz',['id'=>$getDataVal->id])}}" target="_blank" class="waves-effect waves-light btn" style="background-color: #736cb5;">
                                Start
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@else
<div class="card-content " style="text-align: center;">
    <div class=" card-alert card green lighten-5" id="noSession" style="margin: auto;width: 50%; text-align: center">
        <div class=" card-content green-text">
            <p>No Data Found</p>
        </div>
    </div>
</div>
@endif
<script src="{{asset('vendors/select2/select2.full.min.js')}}"></script>
<script src="{{asset('vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('vendors/data-tables/js/dataTables.select.min.js')}}"></script>
<script src="{{asset('js/scripts/form-select2.js')}}"></script>
<script src="{{asset('js/scripts/data-tables.js')}}"></script>