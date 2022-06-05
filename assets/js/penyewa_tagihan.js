function edit(id) {
	$("#basic").submit(function (e) {
		swal({
			title: "Anda sudah yakin melakukan perubahan data ?",
			text: "Pastikan data yang diinput benar!",
			icon: "warning",
			buttons: ["Tidak", "Iya"],
			dangerMode: true,
		}).then(function (isConfirm) {
			if (isConfirm) {
				var file_data = $("#file_name").prop("files")[0];
				var form_data = new FormData();
				form_data.append("file", file_data);
				$.ajax({
					type: "POST",
					url: baseUrl + "penyewa/C_tagihan/update/" + id,
					cache: false,
					contentType: false,
					processData: false,
					data: form_data,
					dataType: "json",
					error: function (jqXHR, textStatus, errorThrown) {
						console.log(arguments);
						console.log(errorThrown);
						console.log(textStatus);
					},
					success: function (data) {
						if (data.status === true) {
							swal({
								title: "Berhasil",
								text: "Data Berhasil Diperbarui",
								icon: "success",
								button: "OK",
							}).then(function (isConfirm) {
								window.location = baseUrl + "penyewa/C_tagihan";
							});
						} else {
							swal({
								title: "Error",
								text: "Data Gagal Diperbarui",
								icon: "error",
								button: "OK",
							});
						}
					},
				});
			} else {
				swal("Cancelled", "", "error");
			}
		});
		return false;
	});
}
