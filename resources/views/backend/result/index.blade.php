@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">Insert Result</h4>
                        <form action="{{ route('result.store') }}" method="post">
                        @csrf
                            <input type="hidden" id="schools_id" value="{!! Auth::user()->schools_id !!}">
                            <div class="form-group">
                                <label for="">Student ID</label>
                                <input class="form-control" list="students_id" id="student_id" name="student_id" onchange="student_info()" >

                                <datalist id="students_id">
                                    @foreach($students_list as $row)
                                        <option value="{!! $row->username !!}">
                                    @endforeach
                                </datalist>
                            </div>
                            <div class="form-group">
                                <label for="">Class</label>
                                <input class="form-control" type="text" value="" name="school_classes_id_1" id="school_classes_id_1" readonly>
                                <input type="hidden" name="school_classes_id" id="school_classes_id">
                            </div>
                            <div class="form-group">
                                <label for="">Section</label>
                                <input class="form-control" type="text" value="" name="school_sections_id_1" id="school_sections_id_1" readonly>
                                <input type="hidden" name="school_sections_id" id="school_sections_id">
                            </div>

                            <div class="form-group">
                                <label for="">Subject</label>
                                <select class="form-control subject_list" name="school_subjects_id" id="school_subjects_id" required>
            
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Exam</label>
                                <select class="form-control" name="exams_id" id="exams_id">
                                    <option value="">Choose Your Option</option>
                                @foreach($exams as $row)
                                    <option value="{!! $row->id !!}">{!! $row->name !!}</option>
                                @endforeach    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Obtained Mark</label>
                                <input class="form-control" type="number" min="0" max="100" name="obtained_mark" required>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- container -->
</div> <!-- Page content Wrapper -->
@endsection


@section('footer')
<script>
function student_info(){
    var students_id = $('#student_id').val();
    var schools_id = $('#schools_id').val();



    if(students_id && schools_id){
        $.ajax({
            type: 'POST',
            url : '/ajaxresult',
            data:{
                'students_id'	:	students_id,
                'schools_id'	:	schools_id,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
               //console.log(data);
               
               var select = document.getElementById("subject_list"); 

               $('.subject_list').empty();
               for($i=0;$i<data[1].length;$i++){
                $('.subject_list').append($('<option></option>').val(data[1][$i]['id']).html(data[1][$i]['name']));
               }    

               $('#school_classes_id_1').val(data[0]['school_classes']['name']);
               $('#school_sections_id_1').val(data[0]['school_sections']['name']);
               $('#school_classes_id').val(data[0]['school_classes']['id']);
               $('#school_sections_id').val(data[0]['school_sections']['id']);
            
            },

        });

    }

}

</script>

<script>  
/*
 $(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><select class="form-control name_list" name="" id="subject_list"></select></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>'); 
                                
                                 
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  

 });  
 */
 </script>

@endsection