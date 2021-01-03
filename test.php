<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
            $('#myDropDown').change(function(){
                //Selected value
                var inputValue = $(this).val();
                alert("value in js "+inputValue);

                //Ajax for calling php function
                $.post('submit.php', { dropdownValue: inputValue }, function(data){
                    alert('ajax completed. Response:  '+data);
                    //do after submission operation in DOM
                });
            });
        });
        </script>
    </head>
<body>
    <select id="myDropDown">
        <option value='' disabled selected>Assign Driver</option>
        <option value='4353'>Steve Jobs</option>
        <option value='3333'>Ian Wright</option>
        <option value='66666'>Mark James</option>
     </select>

</body>
</html>