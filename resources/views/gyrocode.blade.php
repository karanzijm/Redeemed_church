
<link href="https://cdn.datatables.net/v/dt/dt-1.10.16/sl-1.2.5/datatables.min.css" rel="stylesheet">
<link href="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet">


<form id="frm-example" action="{{ route('getAll') }}" method="POST">

<table id="example" class="display" cellspacing="0" width="100%">
   <thead>
      <tr>
         <th></th>
         {{-- <th>No</th> --}}
         <th>Name</th>
         <th>Email</th>
         <th>Contact</th>
         <th>Location</th>
         <th>Home Cell</th>
         <th>Marital Status</th>
         <th>Number of children</th>
         <th>Action</th>
      </tr>
   </thead>
   
</table>

<hr>

<p>Press <b>Submit</b> and check console for URL-encoded form data that would be submitted.</p>

<p><button>Submit</button></p>

<p><b>Selected rows data:</b></p>
<pre id="example-console-rows"></pre>

<p><b>Form data as submitted to the server:</b></p>
<pre id="example-console-form"></pre>

</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>  
<script src="https://cdn.datatables.net/v/dt/dt-1.10.16/sl-1.2.5/datatables.min.js"></script>  
<script src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>  

<script>
    $(document).ready(function() {
   var table = $('#example').DataTable({
      'processing': true,
      'serverSide': true,
      'ajax': "{{ route('users') }}",
      'columnDefs': [
         {
            'targets': 0,
            'checkboxes': {
               'selectRow': true
            }
         }
      ],
      'select': {
         'style': 'multi'
      },
      'order': [[1, 'asc']]
   });

   
   
   // Handle form submission event 
   $('#frm-example').on('submit', function(e){
      var form = this;
      
      var rows_selected = table.column(0,{ search: 'applied'}).checkboxes.selected();

      // Iterate over all selected checkboxes
      $.each(rows_selected, function(index, rowId){
         // Create a hidden element 
         $(form).append(
             $('<input>')
                .attr('type', 'hidden')
                .attr('name', 'id[]')
                .val(rowId)
         );
      });

      // FOR DEMONSTRATION ONLY
      // The code below is not needed in production
      
      // Output form data to a console     
      $('#example-console-rows').text(rows_selected.join(","));
      
      // Output form data to a console     
      $('#example-console-form').text($(form).serialize());
       
      // Remove added elements
      $('input[name="id\[\]"]', form).remove();
       
      // Prevent actual form submission
      e.preventDefault();
   });   
});
</script>