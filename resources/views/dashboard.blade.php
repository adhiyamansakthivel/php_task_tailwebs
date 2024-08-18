<!doctype html>
<html lang="en">
 @include('head.head')

<body>

  <header class="p-3 mb-3 border-bottom navbar">

        <div class="container d-flex flex-wrap">
          <ul class="nav me-auto">
            <li class="nav-item"><h1  aria-current="page">tailwebs.</h1></li>
        
          </ul>
          <ul class="nav">
            <li class="nav-item"><a href="/" class="nav-link link-dark px-2">Home</a></li>
            <li class="nav-item"> 
                  <a href="{{ route('logout') }}" class="nav-link link-dark px-2"  onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();"> {{ __('Logout') }}</a>
                              
                
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
               
            </li>
          </ul>
        </div>
        
    
  </header>
<main>

 

  <div class="container py-4">
    
      {{-- @session('success')
      <div class="alert alert-success" role="alert"> 
        {{ $value }}
      </div>
      @endsession --}}
      <center>
        <h4>Teacher Panel: {{ auth()->user()->name }} </h4>
      </center>
   
   
    <div class="p-5 mb-5 rounded-3" style="background: #fff">
      <center>
        <h5 style="color:red">Students Records</h5>
      </center>
      
      <br/><br/>

      <div id="alert-div"></div>
        <table class="table data-table">
          <thead > 
            <tr>
              <th>Name</th>
              <th width="240px">Subject</th>
              <th>Marks</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="projects-table">
           
          </tbody>
        </table>

      

        
   
    </div>
    <button class="add-button" onclick="createProject()">Add</button>


    <!-- project form modal -->
<div class="modal" tabindex="-1" role="dialog" id="form-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Students</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="error-div"></div>
        <form>
            <input type="hidden" name="update_id" id="update_id">
            <div class="form-group">
                <label >Name</label>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"></path>
                    </svg>
                  </span>
                  <input type="text" class="form-control" id="name" name="name">
                </div>
            </div>
           
            <div class="form-group">
                <label >Subject</label>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-square-text" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1h-2.5a2 2 0 0 0-1.6.8L8 14.333 6.1 11.8a2 2 0 0 0-1.6-.8H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                    <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6m0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
                    </svg>
                  </span>
                  <input type="text" class="form-control" id="subject" name="subject">
                </div>
            </div>
            <div class="form-group">
              <label >Marks</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark" viewBox="0 0 16 16">
                  <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z"/>
                  </svg>
                </span>
                <input type="text" class="form-control" id="marks" name="marks">
              </div>
              
            </div>
            <center>
              <button type="submit" class="modal-button" id="save-project-btn">Save</button>
            </center>
            
        </form>
      </div>
    </div>
  </div>
</div>
  
<!-- view project modal -->
<div class="modal " tabindex="-1" role="dialog" id="view-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Project Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <b>Name:</b>
        <p id="name-info"></p>
        <b>Subject:</b>
        <p id="subject-info"></p>
        <b>Marks:</b>
        <p id="marks-info"></p>
      </div>
    </div>
  </div>
</div>
    

  </div>
</main>

<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript">
  
    $(function() {

      
        var baseUrl = $('meta[name=app-url]').attr("content");
        let url = "{{ route('students.index') }}";
        // create a datatable
        $('#projects_table').DataTable({
            processing: true,
            ajax: url,
            "order": [[ 0, "desc" ]],
            columns: [
              {data: 'name', "render": function ( data) {return "<img src='https://ui-avatars.com/api/?name=John+Doe' alt='John Doe Avatar' width='80px'>";}},
              {data: 'subject'},
              {data: 'marks'},
              {data: 'action'},
            ],
              
        });
      });

      
      

      var table = $('.data-table').DataTable({
        processing: true,
        ajax: "{{ route('students.index') }}",
        columns: [
            {data: 'name', name: 'name', "render": function ( data) {return "<p><img src='https://ui-avatars.com/api/?background=0096FF&color=fff&rounded=true&name="+data+"'  width='30px'>&nbsp;&nbsp;"+data+"<p>";}},
            {data: 'subject', name: 'subject'},
            {data: 'marks', name: 'marks'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
      
  
    function reloadTable()
    {
        /*
            reload the data on the datatable
        */
        $('.data-table').DataTable().ajax.reload();
    }
  
    /*
        check if form submitted is for creating or updating
    */
    $("#save-project-btn").click(function(event ){
        event.preventDefault();
        if($("#update_id").val() == null || $("#update_id").val() == "")
        {
            storeProject();
        } else {
            updateProject();
        }
    })
  
    /*
        show modal for creating a record and 
        empty the values of form and remove existing alerts
    */
    function createProject()
    {
        $("#alert-div").html("");
        $("#error-div").html("");
        $("#update_id").val("");
        $("#name").val("");
        $("#subject").val("");
        $("#marks").val("");
        $("#form-modal").modal('show'); 
    }
  
    /*
        submit the form and will be stored to the database
    */
    function storeProject()
    {   
        $("#save-project-btn").prop('disabled', true);
        let url = $('meta[name=app-url]').attr("content") + "/students";
        let data = {
            name: $("#name").val(),
            subject: $("#subject").val(),
            marks: $("#marks").val(),
        };
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            type: "POST",
            data: data,
            success: function(response) {
                $("#save-project-btn").prop('disabled', false);
                let successHtml = '<div class="alert alert-success" role="alert"><b>Student Added Successfully</b></div>';
                $("#alert-div").html(successHtml);
                $("#name").val("");
                $("#subject").val("");
                $("#marks").val("");
                reloadTable();
                $("#form-modal").modal('hide');
            },
            error: function(response) {
              // console.log(response);
                $("#save-project-btn").prop('disabled', false);
                if(response.status != 200){
                  let errorHtml = '<div class="alert alert-danger" role="alert">' +
                      '<b>Validation Error!</b>' +
                      '<ul>' + response.responseJSON.message +'</ul>' +
                  '</div>';
                  $("#error-div").html(errorHtml);  
                }
              //   if(response.status == 403)
              //   {
              //     let errors = response.responseJSON.message;
              //     let errorHtml = '<div class="alert alert-danger" role="alert">' +
              //         '<b>Validation Error!</b>' +
              //         '<ul>' + errors +'</ul>' +
              //     '</div>';
              //     $("#error-div").html(errorHtml);      
              //   }
              //   if (typeof response.responseJSON.errors !== 'undefined') 
              //   {
              //     let errors = response.responseJSON.errors;
              //     let nameValidation = "";
              //     if (typeof errors.name !== 'undefined') 
              //                     {
              //                         nameValidation = '<li>' + errors.name[0] + '</li>';
              //                     }
              //     let subjectValidation = ""
              //     if (typeof errors.subject !== 'undefined') 
              //                     {
              //                         subjectValidation = '<li>' + errors.subject[0] + '</li>';
              //                     }
              //     let marksValidation = ""
              //     if (typeof errors.marks !== 'undefined') 
              //                     {
              //                         marksValidation = '<li>' + errors.marks[0] + '</li>';
              //                     }
            
                    
              //     let errorHtml = '<div class="alert alert-danger" role="alert">' +
              //         '<b>Validation Error!</b>' +
              //         '<ul>' + nameValidation + subjectValidation + marksValidation+'</ul>' +
              //     '</div>';
              //     $("#error-div").html(errorHtml);            
              // }
            }
        });
    }
  
  
    /*
        edit record function
       
    */
    function editProject(id)
    {
        let url = $('meta[name=app-url]').attr("content") + "/students/" + id;
        $.ajax({
            url: url,
            type: "GET",
            success: function(response) {
                let project = response.project;
                $("#alert-div").html("");
                $("#error-div").html("");
                $("#update_id").val(project.id);
                $("#name").val(project.name);
                $("#subject").val(project.subject);
                $("#marks").val(project.marks);
                $("#form-modal").modal('show'); 
            },
            error: function(response) {
                console.log(response.responseJSON)
            }
        });
    }
  
    /*
        sumbit the form and will update a record
    */
    function updateProject()
    {
        $("#save-project-btn").prop('disabled', true);
        let url = $('meta[name=app-url]').attr("content") + "/students/" + $("#update_id").val();
        let data = {
            id: $("#update_id").val(),
            name: $("#name").val(),
            subject: $("#subject").val(),
            marks: $("#marks").val(),
        };
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            type: "PUT",
            data: data,
            success: function(response) {

                $("#save-project-btn").prop('disabled', false);
                let successHtml = '<div class="alert alert-success" role="alert"><b>Student Updated Successfully</b></div>';
                $("#alert-div").html(successHtml);
                $("#name").val("");
                $("#subject").val("");
                $("#marks").val("");
                reloadTable();
                $("#form-modal").modal('hide');
                

            },
            error: function(response) {
                $("#save-project-btn").prop('disabled', false);
                if(response.status != 200){
                  let errorHtml = '<div class="alert alert-danger" role="alert">' +
                      '<b>Validation Error!</b>' +
                      '<ul>' + response.responseJSON.message +'</ul>' +
                  '</div>';
                  $("#error-div").html(errorHtml);  
                }
              //   if(response.status == 403)
              //   {
              //     let errors = response.responseJSON.message;
              //     let errorHtml = '<div class="alert alert-danger" role="alert">' +
              //         '<b>Validation Error!</b>' +
              //         '<ul>' + errors +'</ul>' +
              //     '</div>';
              //     $("#error-div").html(errorHtml);      
              //   }
              //   if (typeof response.responseJSON.errors !== 'undefined') 
              //   {
              //     let errors = response.responseJSON.errors;
              //     let nameValidation = "";
              //     if (typeof errors.name !== 'undefined') 
              //                     {
              //                         nameValidation = '<li>' + errors.name[0] + '</li>';
              //                     }
              //     let subjectValidation = ""
              //     if (typeof errors.subject !== 'undefined') 
              //                     {
              //                         subjectValidation = '<li>' + errors.subject[0] + '</li>';
              //                     }
              //     let marksValidation = ""
              //     if (typeof errors.marks !== 'undefined') 
              //                     {
              //                         marksValidation = '<li>' + errors.marks[0] + '</li>';
              //                     }
            
                    
              //     let errorHtml = '<div class="alert alert-danger" role="alert">' +
              //         '<b>Validation Error!</b>' +
              //         '<ul>' + nameValidation + subjectValidation + marksValidation+'</ul>' +
              //     '</div>';
              //     $("#error-div").html(errorHtml);            
              // }
            }
        });
    }
  
    
  
    /*
        delete record function
    */
    function destroyProject(id)
    {
        let url = $('meta[name=app-url]').attr("content") + "/students/" + id;
        let data = {
            name: $("#name").val(),
            description: $("#description").val(),
        };
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            type: "DELETE",
            data: data,
            success: function(response) {
                let successHtml = '<div class="alert alert-success" role="alert"><b>Student Deleted Successfully</b></div>';
                $("#alert-div").html(successHtml);
                reloadTable();
            },
            error: function(response) {
                console.log(response.responseJSON)
            }
        });
    }
</script>

</body>
</html>
