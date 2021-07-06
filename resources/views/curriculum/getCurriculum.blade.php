
<?php

use App\Models\Course;
?>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>

  <div class="row">
      <div class="col m6 s12">
          <h5>Assigned Curriculum List</h5>
          <div class="input-field">
            <ul>

              @forelse($res as $key)
              <li>{{$key->topic_name}}</li>
              @empty
    <div class="text-center jumbotron">
        <h6 style="color:blue;">No Curriculum Assinged </h6>
    </div>
@endforelse

            </ul>
          </div>
      </div>
</div>

  <div class="row">
      <div class="col m12 s12">
          <h5>Assign Curriculum</h5>
          <div class="input-field">
              <select class="select2 browser-default" id='myselect' multiple  name="lesson[]" required="1" >
                <option value="">------ SELECT LESSON ------</option>

                @foreach($lesson as $key=>$val)
                <option value="{{$key}}">{{strtoupper($val)}}</option>
                @endforeach


              </select>
          </div>
      </div>
</div>
      <div class="row">
          <div class="col m6 s12">
              <h5>Start Date</h5>
              <div class="input-field">
                  <input type="date" id="start_date" name ="start_date"></input>

              </div>
          </div>

              <div class="col m6 s12">
                  <h5>End Date</h5>
                  <div class="input-field">
                      <input type="date"id="end_date" name ="end_date"></input>

                  </div>
              </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
  <script>
  $('#myselect').select2({
    width: '100%',

    //placeholder: "Choose Lesson",
      theme: "classic",
    allowClear: true

  });

</script>


<script src="{{asset('js/plugins.js')}}"></script>
