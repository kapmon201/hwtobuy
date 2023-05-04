app.controller('latang_controller', function ($scope, $rootScope, $http) {

	$scope.awal = function () {
		$(document).find('#loading_panel_lite').hide();
		$(document).find('#simpan').show();
		$(document).find('#update').hide();

		$scope.id_privilege = '';
		$scope.nip2 = '';
		$scope.id_privilege = '';
		$scope.id_status = '';
		$scope.tgl_expired = '';
		$scope.nm_pegawai = '';
		$scope.tgl_insert = '';
		$scope.id = '';
		$scope.nama = '';
	},

		$scope.ambil_ref = function (data_input) {
			var data = {
				url: $scope.base_url + 'app/latang/ambil_ref',
				type: 'GET',
				dataType: 'json',
				success: function (result) {
					data_response = result.response;
					$scope.semua_ref = data_response
					$scope.$apply();
				},
				error: function (result) {
					if (result.statusText !== 'abort')
						sweetAlert(result.statusText, result.responseText, "error");
				}
			};
			if (typeof $rootScope.ajaxRequest_depo !== 'undefined') $rootScope.ajaxRequest_depo.abort();
			$rootScope.ajaxRequest_depo = $.ajax(data);
		},

		$scope.ambil = function (data_input) {
			var data = {
				url: $scope.base_url + 'app/latang/ambil',
				data: { id_adadoksuser: data_input },
				type: 'GET',
				dataType: 'json',
				beforeSend: function () {
					if (typeof $scope.panggil == 'undefined') $scope.ambil_ref();
					$scope.panggil = 1;
				},
				success: function (result) {
					data_response = result.response;
					if (typeof data_input === 'undefined') {
						$scope.semua = data_response
					} else {
						$.each(data_response, function (index, value) {
							$scope.id_adadoksuser = value.ID_ADADOKSUSER;
							$scope.nip2 = value.NIP2;
							$scope.nm_pegawai = value.NM_PEGAWAI;
							$scope.id_status = value.ID_STATUS;
							$scope.id_privilege = value.ID_PRIVILEGE;
							$scope.tgl_expired = value.TGL_EXPIRED;
							$scope.id = value.ID;
							$scope.nama = value.NAMA;

							$(document).find('#simpan').hide();
							$(document).find('#update').show();
						});
					}
					$scope.$apply();
				},
				error: function (result) {
					if (result.statusText !== 'abort')
						sweetAlert(result.statusText, result.responseText, "error");
				}
			};
			if (typeof $rootScope.ajaxRequest !== 'undefined') $rootScope.ajaxRequest.abort();
			$rootScope.ajaxRequest = $.ajax(data);
		},

		$scope.simpan = function (mode) {
			try {
				if (typeof $scope.tgl_expired !== 'undefined' && $scope.tgl_expired !== null) {
					tgl_expired = new Date($scope.tgl_expired);
				} else {
					tgl_expired = new Date();
				}
				bulan = ('0' + (tgl_expired.getMonth() + 1)).slice(-2);
				hari = ('0' + tgl_expired.getDate()).slice(-2);
				tahun = tgl_expired.getFullYear();
				$scope.tgl_expired_ = String(tahun + bulan + hari);

				mode_input = (typeof mode === 'undefined' || mode === '') ? 'simpan' : 'update';

				var data = {
					url: $scope.base_url + 'app/latang/simpan',
					type: 'POST',
					data: {
						mode_input: mode_input,
						id_adadoksuser: $scope.id_adadoksuser,
						nip2: $scope.nip2,
						nama: $scope.nama,
						id_depo: $scope.id_depo,
						tanggal: $scope.tanggal_,
					},
					dataType: 'json',
					success: function (result) {
						$scope.initialForm();
						$scope.getData();
					},
					error: function (result) {
						if (result.statusText !== 'abort')
							sweetAlert(result.statusText, result.responseText, "error");
					}
				};
				if (typeof $rootScope.ajaxRequest !== 'undefined') $rootScope.ajaxRequest.abort();
				$rootScope.ajaxRequest = $.ajax(data);
			} catch (err) {
				sweetAlert('Error Pengisian Data', err, "error");
			}
		},
		$scope.deleteData = function (data_input) {
			if (confirm('Anda Yakin Akan Menghapus Data ini ?')) {
				var data = {
					url: $scope.base_url + 'api/master_pegawai/delete_data',
					data: { nip: data_input },
					type: 'POST',
					dataType: 'json',
					success: function (result) {
						sweetAlert({
							title: result.response.type,
							text: result.response.msg,
							type: 'success',
							timer: 2000,
							showConfirmButton: false
						});
						$scope.initialForm();
						$scope.getData();
					},
					error: function (result) {
						if (result.statusText !== 'abort')
							sweetAlert(result.statusText, result.responseText, "error");
					}
				};
				if (typeof $rootScope.ajaxRequest !== 'undefined') $rootScope.ajaxRequest.abort();
				$rootScope.ajaxRequest = $.ajax(data);
			}
		},
		$scope.toogleStatus = function (data_input, id, level) {
			var data = {
				url: $scope.base_url + 'api/master_pegawai/toogle_data',
				type: 'POST',
				data: {
					mode_input: 'update',
					value: (level == true) ? 1 : 0,
					nip: data_input,
					objectname: id
				},
				dataType: 'json',
				success: function (result) {
					$scope.initialForm();
					$scope.getData();
				},
				error: function (result) {
					if (result.statusText !== 'abort')
						sweetAlert(result.statusText, result.responseText, "error");
				}
			};
			if (typeof $rootScope.ajaxRequest !== 'undefined') $rootScope.ajaxRequest.abort();
			$rootScope.ajaxRequest = $.ajax(data);
		},
		$scope.toogleStatus_normal = function (data_input, id, level) {
			var data = {
				url: $scope.base_url + 'api/master_pegawai/toogle_data',
				type: 'POST',
				data: {
					mode_input: 'update',
					value: level,
					nip: data_input,
					objectname: id
				},
				dataType: 'json',
				success: function (result) {
					$scope.initialForm();
					$scope.getData();
				},
				error: function (result) {
					if (result.statusText !== 'abort')
						sweetAlert(result.statusText, result.responseText, "error");
				}
			};
			if (typeof $rootScope.ajaxRequest !== 'undefined') $rootScope.ajaxRequest.abort();
			$rootScope.ajaxRequest = $.ajax(data);
		}
});