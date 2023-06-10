<!-- jQuery -->
<script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE/dist/js/adminlte.min.js') }}"></script>

<script>
    function getAge() {
	var date = document.getElementById('birthday').value;

	if(date === ""){
		alert("Please complete the required field!");
    }else{
		var today = new Date();
		var birthday = new Date(date);
		var year = 0;
		if (today.getMonth() < birthday.getMonth()) {
			year = 1;
		} else if ((today.getMonth() == birthday.getMonth()) && today.getDate() < birthday.getDate()) {
			year = 1;
		}
		var age = today.getFullYear() - birthday.getFullYear() - year;

		if(age < 0){
			age = 0;
		}
		document.getElementById('result').innerHTML = age;
	}
}
</script>

<script>
    $(document).ready(function(){
        $(document).on('click', '#select', function(){
            var id_pelayanan = $(this).data('id_pelayanan');
            var nm_pelayanan = $(this).data('nm_pelayanan');
            $('#id_pelayanan').val(id_pelayanan);
            $('#nm_pelayanan').val(nm_pelayanan);
            $('#modal_pelayanan').modal('hide');
        })
    })
</script>
