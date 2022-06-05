function search() {
	$("#basic").submit(function (e) {
    e.preventDefault();    
		$("#data-item").hide();    
		let search = $("#searchType").val();
		$.ajax({
			type: "POST",
			url: baseUrl + "C_dashboard/search_penyewa",
			data: { search: search },
			dataType: "JSON",      
			error: function (jqXHR, textStatus, errorThrown) {
				console.log(arguments);
				console.log(errorThrown);
				console.log(textStatus);
			},
			success: function (data) {  
        $("#data-item").empty();      
				if (data.status == true) {
					$("#data-item").show();          
					$.each(data.result, function (i, val) {
						$("#data-item").append(
							`                
                <div class="list-group-item">
                  <div class="row">
                    <div class="col-auto" style="align-self: center;">
                      <img class="img-fluid" src="${baseUrlImage}/${val.image}" alt="Photo" style="max-height: 160px;">
                    </div>
                    <div class="col px-4">
                      <div>                    
                        <h3><b>${val.nama}</b></h3>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="row">
                              <div class="col-5">
                                <p class="mb-0"><b>Nomor KTP</b></p>
                              </div>
                              <div class="col-1">
                                <p class="mb-0">:</p>
                              </div>
                              <div class="col-6">
                                <p class="mb-0">${val.noKtp}</p>
                              </div>
                            </div>                     
                            <div class="row">
                              <div class="col-5">
                                <p class="mb-0"><b>Nomor Unit</b></p>
                              </div>
                              <div class="col-1">
                                <p class="mb-0">:</p>
                              </div>
                              <div class="col-6">
                                <p class="mb-0">${val.noUnit}</p>
                              </div>
                            </div>                  
                            <div class="row">
                              <div class="col-5">
                                <p class="mb-0"><b>Nomor Meteran Air</b></p>
                              </div>
                              <div class="col-1">
                                <p class="mb-0">:</p>
                              </div>
                              <div class="col-6">
                                <p class="mb-0">${val.noMeteranAir}</p>
                              </div>
                            </div>                    
                          </div>
                          <div class="col-md-4">                     
                            <div class="row">
                              <div class="col-5">
                                <p class="mb-0"><b>Nomor Telepon</b></p>
                              </div>
                              <div class="col-1">
                                <p class="mb-0">:</p>
                              </div>
                              <div class="col-6">
                                <p class="mb-0">${val.noTelepon}</p>
                              </div>
                            </div>                    
                            <div class="row">
                              <div class="col-5">
                                <p class="mb-0"><b>Nomor Meteran Listrik</b></p>
                              </div>
                              <div class="col-1">
                                <p class="mb-0">:</p>
                              </div>
                              <div class="col-6">
                                <p class="mb-0">${val.noMeteranListrik}</p>
                              </div>
                            </div>                                      
                          </div>
                          <div class="col-md-4">                     
                            <div class="row">
                              <div class="col-5">
                                <p class="mb-0"><b>Tagihan (Belum Dibayar)</b></p>
                              </div>
                              <div class="col-1">
                                <p class="mb-0">:</p>
                              </div>
                              <div class="col-6">
                                <p class="mb-0">${val.totalUnpaid}</p>
                              </div>
                            </div>                    
                            <div class="row">
                              <div class="col-5">
                                <p class="mb-0"><b>Tagihan (Sudah Dibayar)</b></p>
                              </div>
                              <div class="col-1">
                                <p class="mb-0">:</p>
                              </div>
                              <div class="col-6">
                                <p class="mb-0">${val.totalPaid}</p>
                              </div>
                            </div>                                      
                            <div class="row">
                              <div class="col-5">
                                <p class="mb-0"></p>
                              </div>
                              <div class="col-1">
                                <p class="mb-0"></p>
                              </div>
                              <div class="col-6">
                                <p class="mb-0"></p>
                              </div>
                            </div>                                      
                          </div>                   
                        </div>                    
                      </div>
                    </div>
                  </div>
                </div>`
						);
					});
				} else {
					$("#data-item").hide();
					swal({
						title: "Error",
						text: "Data tidak ditemukan",
						icon: "error",
						button: "OK",
					});
				}
			},
		});
		return false;
	});
}
