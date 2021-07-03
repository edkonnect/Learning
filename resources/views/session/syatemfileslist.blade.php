<input type="hidden" id="filesType" name="filesType"/>
@if(isset($files) && !empty($files))
<?php
//echo '<pre>';
//print_r($files); die;
$i=1;
?>
@foreach ($files as $fileNames)
@if($fileNames!='.' && $fileNames!='..')

<div class="row" style="{{$i!=1 ? 'margin-top:60px':''}}">
    <div class="input-field col m6 s6"> 
        <label>
            <input type="radio" class="myFilesNameSelect" name="myFilesNameSelect" value="{{isset($fileNames)?$fileNames:''}}" />            
            <span>{{isset($fileNames) && $fileNames!=''?$fileNames:''}}</span>
        </label>
    </div>
    <div class="input-field col m6 s6">                                
        <label>   
            <embed src= "{{url('/').'/internal/uploads/'.Auth::user()->username.'/'.$fileNames}}" width= "300" height= "75">
        </label>
    </div>

</div>
@php $i++; @endphp
@endif
@endforeach
@endif