function login() {
	$("#basic").submit(function (e) {
		$.ajax({
			type: "POST",
			url: baseUrl + "C_login/cek_login",
			data: $(e.target).serialize(),
			dataType: "json",
			beforeSend: function () {
				console.log($(e.target).serialize());
			},
			error: function (jqXHR, textStatus, errorThrown) {
				console.log(arguments);
				console.log(errorThrown);
				console.log(textStatus);
			},
			success: function (data) {
				if (data.status === true) {
					if(data.kategori == 1){
						swal({
							title: "Berhasil",
							text: "Login Berhasil",
							icon: "success",
							button: "OK",
						}).then(function (isConfirm) {
							window.location = baseUrl + "C_dashboard";
						});
					}else if(data.kategori == 2){
						swal({
							title: "Berhasil",
							text: "Login Berhasil",
							icon: "success",
							button: "OK",
						}).then(function (isConfirm) {
							window.location = baseUrl + "penyewa/C_tagihan";
						});
					}else{
						swal({
							title: "Berhasil",
							text: "Login Berhasil",
							icon: "success",
							button: "OK",
						}).then(function (isConfirm) {
							window.location = baseUrl + "maintenance/C_maintenance";
						});
					}					
				} else {
					swal({
						title: "Error",
						text: "Login Gagal",
						icon: "error",
						button: "OK",
					});
					$("#username").val(null).trigger("change");
					$("#password").val(null).trigger("change");
				}
			},
		});
		return false;
	});
}
