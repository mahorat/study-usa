
//example
//uploadFile(controller, input, progress)

	$('#file1').change(function(){
		$(this).simpleUpload("/candidateDocumentUpload1", {

			allowedExts: ["jpg", "jpeg", "png", "gif"],
			allowedTypes: ["image/pjpeg", "image/jpeg", "image/png", "image/x-png", "image/gif", "image/x-gif"],

			data: {_token: $("input[name='_token']").val(), 
					'file': $('#file1').val()},

			start: function(file){
				//upload started
				$('#filename').html(file.name);
				$('.progressBar1').width(0);
			},

			progress: function(progress){
				//received progress
				$('#statusUpload1').html('<i class="fa fa-spinner fa-pulse fa-fw"></i><span class="sr-only">Loading...</span>');
				$('.progressBar1').width(progress + "%");
			},

			success: function(data){
				//upload successful
				$('#statusUpload1').html('<i class="fa fa-check" aria-hidden="true"></i>');
			},

			error: function(error){
				//upload failed
				$("#statusUpload1").html('');
				alert("Failure!<br>" + error.name + ": " + error.message);
			}

		});
	});

	$('#file2').change(function(){
		$(this).simpleUpload("/candidateDocumentUpload2", {

			allowedExts: ["jpg", "jpeg", "png", "gif"],
			allowedTypes: ["image/pjpeg", "image/jpeg", "image/png", "image/x-png", "image/gif", "image/x-gif"],

			data: {_token: $("input[name='_token']").val(), 
					'file': $('#file2').val()},

			start: function(file){
				//upload started
				$('#filename').html(file.name);
				$('.progressBar2').width(0);
			},

			progress: function(progress){
				//received progress
				$('#statusUpload2').html('<i class="fa fa-spinner fa-pulse fa-fw"></i><span class="sr-only">Loading...</span>');
				$('.progressBar2').width(progress + "%");
			},

			success: function(data){
				//upload successful
				$('#statusUpload2').html('<i class="fa fa-check" aria-hidden="true"></i>');
			},

			error: function(error){
				//upload failed
				$("#statusUpload2").html('');
				alert("Failure!<br>" + error.name + ": " + error.message);
			}

		});
	});

	$('#file3').change(function(){
		$(this).simpleUpload("/candidateDocumentUpload3", {

			allowedExts: ["jpg", "jpeg", "png", "gif"],
			allowedTypes: ["image/pjpeg", "image/jpeg", "image/png", "image/x-png", "image/gif", "image/x-gif"],

			data: {_token: $("input[name='_token']").val(), 
					'file': $('#file3').val()},

			start: function(file){
				//upload started
				$('#filename').html(file.name);
				$('.progressBar3').width(0);
			},

			progress: function(progress){
				//received progress
				$('#statusUpload3').html('<i class="fa fa-spinner fa-pulse fa-fw"></i><span class="sr-only">Loading...</span>');
				$('.progressBar3').width(progress + "%");
			},

			success: function(data){
				//upload successful
				$('#statusUpload3').html('<i class="fa fa-check" aria-hidden="true"></i>');
			},

			error: function(error){
				//upload failed
				$("#statusUpload3").html('');
				alert("Failure!<br>" + error.name + ": " + error.message);
			}

		});
	});

	$('#file4').change(function(){
		$(this).simpleUpload("/candidateDocumentUpload4", {

			allowedExts: ["jpg", "jpeg", "png", "gif"],
			allowedTypes: ["image/pjpeg", "image/jpeg", "image/png", "image/x-png", "image/gif", "image/x-gif"],

			data: {_token: $("input[name='_token']").val(), 
					'file': $('#file4').val()},

			start: function(file){
				//upload started
				$('#filename').html(file.name);
				$('.progressBar4').width(0);
			},

			progress: function(progress){
				//received progress
				$('#statusUpload4').html('<i class="fa fa-spinner fa-pulse fa-fw"></i><span class="sr-only">Loading...</span>');
				$('.progressBar4').width(progress + "%");
			},

			success: function(data){
				//upload successful
				$('#statusUpload4').html('<i class="fa fa-check" aria-hidden="true"></i>');
			},

			error: function(error){
				//upload failed
				$("#statusUpload4").html('');
				alert("Failure! " + error.name + ": " + error.message);
			}

		});
	});

	$('#file5').change(function(){
		$(this).simpleUpload("/candidateDocumentUpload5", {

			allowedExts: ["jpg", "jpeg", "png", "gif"],
			allowedTypes: ["image/pjpeg", "image/jpeg", "image/png", "image/x-png", "image/gif", "image/x-gif"],

			data: {_token: $("input[name='_token']").val(), 
					'file': $('#file5').val()},

			start: function(file){
				//upload started
				$('#filename').html(file.name);
				$('.progressBar5').width(0);
			},

			progress: function(progress){
				//received progress
				$('#statusUpload5').html('<i class="fa fa-spinner fa-pulse fa-fw"></i><span class="sr-only">Loading...</span>');
				$('.progressBar5').width(progress + "%");
			},

			success: function(data){
				//upload successful
				$('#statusUpload5').html('<i class="fa fa-check" aria-hidden="true"></i>');
			},

			error: function(error){
				//upload failed
				$("#statusUpload5").html('');
				alert("Failure! " + error.name + ": " + error.message);
			}

		});
	});

	$('#file6').change(function(){
		$(this).simpleUpload("/candidateDocumentUpload6", {

			allowedExts: ["jpg", "jpeg", "png", "gif"],
			allowedTypes: ["image/pjpeg", "image/jpeg", "image/png", "image/x-png", "image/gif", "image/x-gif"],

			data: {_token: $("input[name='_token']").val(), 
					'file': $('#file6').val()},

			start: function(file){
				//upload started
				$('#filename').html(file.name);
				$('.progressBar6').width(0);
			},

			progress: function(progress){
				//received progress
				$('#statusUpload6').html('<i class="fa fa-spinner fa-pulse fa-fw"></i><span class="sr-only">Loading...</span>');
				$('.progressBar6').width(progress + "%");
			},

			success: function(data){
				//upload successful
				$('#statusUpload6').html('<i class="fa fa-check" aria-hidden="true"></i>');
			},

			error: function(error){
				//upload failed
				$("#statusUpload6").html('');
				alert("Failure! " + error.name + ": " + error.message);
			}

		});
	});