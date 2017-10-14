
// Preview Image Before Upload

// function filePreview(input) {
// 		    if (input.files && input.files[0]) {
// 		        var reader = new FileReader();
// 		        reader.onload = function (e) {
// 		            $('.upload-field + img').remove();
// 		            $('.upload-field').after('<img src="'+e.target.result+'" width="70%" height="auto"/><br>');
// 		        }
// 		        reader.readAsDataURL(input.files[0]);
// 		    }
// 		}
// $(document).on('change','#file',function () {
//     filePreview(this);
// });
function filePreview(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        reader.onload = function (e) {
		            $('.upload-field > img').remove();
		            $('.upload-field').append('<img src="'+e.target.result+'" width="100%" height="auto"/>');
		        }
		        reader.readAsDataURL(input.files[0]);
		    }
		}
$(document).on('change','#file',function () {
    filePreview(this);
});







//Student Form
function fileIdentStudent(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        reader.onload = function (e) {
		            $('.ident-field + img').remove();
		            $('.ident-field').after('<img src="'+e.target.result+'" width="10%" height="auto"/><br>');
		        }
		        reader.readAsDataURL(input.files[0]);
		    }
		}
$("#ident_file").change(function () {
    fileIdentStudent(this);
});

function fileProfileStudent(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        reader.onload = function (e) {
		            $('#square','.content').css({'background-image':'url('+e.target.result+')', 'background-size':'100%','background-repeat':'no-repeat','height':'auto' });
		        }
		        reader.readAsDataURL(input.files[0]);
		    }
		}
$("#profile_file").change(function () {
    fileProfileStudent(this);
});






