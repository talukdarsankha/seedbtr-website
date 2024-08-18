<?php include("include/head.php"); ?>
<!-- top section -->
<?php include("include/top_section.php"); ?>

<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/super-build/ckeditor.js"></script>

<script type="text/javascript">
	let globalEditor;

	// Function to initialize CKEditor
	function initializeCKEditor() {
		CKEDITOR.ClassicEditor
			.create(document.querySelector("#Text"), {
				toolbar: {
					items: [
						'exportPDF', 'exportWord', '|',
						'findAndReplace', 'selectAll', '|',
						'heading', '|',
						'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
						'bulletedList', 'numberedList', 'todoList', '|',
						'outdent', 'indent', '|',
						'undo', 'redo',
						'-',
						'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
						'alignment', '|',
						'link', 'uploadImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
						'specialCharacters', 'horizontalLine', 'pageBreak', '|',
						'textPartLanguage', '|',
						'sourceEditing'
					],
					shouldNotGroupWhenFull: true
				},
				list: {
					properties: {
						styles: true,
						startIndex: true,
						reversed: true
					}
				},
				heading: {
					options: [
						{ model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
						{ model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
						{ model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
						{ model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
						{ model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
						{ model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
						{ model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
					]
				},
				placeholder: 'Type a brief description.......',
				fontFamily: {
					options: [
						'default',
						'Arial, Helvetica, sans-serif',
						'Courier New, Courier, monospace',
						'Georgia, serif',
						'Lucida Sans Unicode, Lucida Grande, sans-serif',
						'Tahoma, Geneva, sans-serif',
						'Times New Roman, Times, serif',
						'Trebuchet MS, Helvetica, sans-serif',
						'Verdana, Geneva, sans-serif'
					],
					supportAllValues: true
				},
				fontSize: {
					options: [10, 12, 14, 'default', 18, 20, 22],
					supportAllValues: true
				},
				htmlSupport: {
					allow: [
						{
							name: /.*/,
							attributes: true,
							classes: true,
							styles: true
						}
					]
				},
				htmlEmbed: {
					showPreviews: true
				},
				link: {
					decorators: {
						addTargetToExternalLinks: true,
						defaultProtocol: 'https://',
						toggleDownloadable: {
							mode: 'manual',
							label: 'Downloadable',
							attributes: {
								download: 'file'
							}
						}
					}
				},
				mention: {
					feeds: [
						{
							marker: '@',
							feed: [
								'@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
								'@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
								'@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
								'@sugar', '@sweet', '@topping', '@wafer'
							],
							minimumCharacters: 1
						}
					]
				},
				removePlugins: [
					'AIAssistant',
					'CKBox',
					'CKFinder',
					'EasyImage',
					'RealTimeCollaborativeComments',
					'RealTimeCollaborativeTrackChanges',
					'RealTimeCollaborativeRevisionHistory',
					'PresenceList',
					'Comments',
					'TrackChanges',
					'TrackChangesData',
					'RevisionHistory',
					'Pagination',
					'WProofreader',
					'MathType',
					'SlashCommand',
					'Template',
					'DocumentOutline',
					'FormatPainter',
					'TableOfContents',
					'PasteFromOfficeEnhanced',
					'CaseChange'
				]
			})
			.then(editor => {
				globalEditor = editor; // Store the CKEditor instance
			})
			.catch(error => {
				console.error(error);
			});
	}

	// Function to retrieve the value of the CKEditor instance
	// function getJobDescriptionValue() {
		
	//     if (globalEditor) {
		 
	//         let jobDescriptionValue = globalEditor.getData();
		   
	//         console.log(jobDescriptionValue);
	//     } else {
	//         console.error('CKEditor instance is not initialized yet.');
	//     }
	// }

	// Initialize CKEditor when the DOM content is fully loaded
	document.addEventListener('DOMContentLoaded', initializeCKEditor);
</script>

	<style>
		.ck-restricted-editing_mode_standard{
		height:150px;
		}
	</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
     $seedMission = $crud->Read("seedmission","1 order by `id` desc");
?>

		<!-- end header -->
		<!-- start color quick setting -->
        <?php  include('include/settings.php'); ?>
		<!-- end color quick setting -->
		<!-- start page container -->
		<div class="page-container">
			<!-- start sidebar menu -->
			<!-- sidebar -->
		<?php include("include/sidebar.php"); ?>
			<!-- end sidebar menu -->
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">About Seed Mission</div>
								 <?php 
		            	if (isset($_SESSION['message'])) {
		            		echo $_SESSION['message'];
		            		unset($_SESSION['message']);
		            	}
		            ?>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								
								<li class="active">View About Seed Mission</li>
							</ol>
						</div>
					</div>

					<style>
						.data_table .col-sm-12 {
							overflow-x: scroll;
						}
						
						td{
							width: 50px;
						}
					</style>

					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="card card-box">
								<div class="card-body " id="bar-parent">
								
									<div class="data_table">
				                    <table id="example" class="table table-striped table-bordered">
				                        <thead class="gradient">
				                            <tr>
				                                <th>ID</th>
				                                <th>Image1</th>
												<th>Image2</th>
				                                <th>Head</th>
				                                <th>Title</th>
				                                <th>Description</th>
				                                <th>uploaded date</th>
				                                <th>Action</th>
				                                
				                            </tr>
				                        </thead>
						                    
										<tfoot>
											<tr>
												<th>ID</th>
												<th>Image1</th>
												<th>Image2</th>
				                                <th>Head</th>
				                                <th>Title</th>
				                                <th>Description</th>
				                                <th>uploaded date</th>
				                                <th>Action</th>
											</tr>
										</tfoot>
										 <tbody>
										<?php 
                                        if ($seedMission) {
                                        	$n=0;
                                        	foreach ($seedMission as $sm) { ?>
                                        	<tr>
	                                        	<td><?php echo ++$n; ?></td>	
	                                        	
												<td  style="min-width: 110px;">
													<div style="text-align: center;">
														<img style="min-width: 110px;" src="<?php echo $sm['image1'];?>"></td>
														<td  style="min-width: 110px;">
													<div style="text-align: center;">
														<img style="min-width: 110px;" src="<?php echo $sm['image2'];?>"></td>
	                                        	<td><?php echo $sm['head'] ;?></td>	
	                                        	<td><?php echo $sm['title'] ;?></td>	
	                                        	<td style="min-width: 350px;"><?php echo $sm['description'] ;?></td>	
	                                        	<td><?php echo $sm['date_uploaded'];?></td>	
												<td><a href="javascript:void(0)"  data-id="<?php echo $sm['id'];?>"  data-target="#model4" data-toggle="modal" class="tblEditBtn">
																<i class="fa fa-pencil"></i>
													</a>
													<a href="javascript:void(0)" class="delete"  data-id="<?php echo $sm['id'];?>" class="tblEditBtn">
														<i class="fa fa-trash-o"></i>
													</a>
												</td>																	
	                                        </tr>	
                                        	<?php }
                                        }
                                        ?>
                                         </tbody>
				                    
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- Modal -->
					
					<div class="modal fade" id="model4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-xl">
						    <div class="modal-content">
						      	<div class="modal-header">
					       			<div class="tabbable-line">
								
										<ul class="nav customtab nav-tabs" role="tablist">
											<li class="nav-item"><a href="#tab1" class="nav-link active"
													data-bs-toggle="tab">Edit
													Data</a></li>
											
										</ul>
									</div>
						      	
						        	<button type="button" data-dismiss="modal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						      	</div>
					      	<form method="post" enctype="multipart/form-data">
					      	<div class="modal-body">
						        <div class="col-sm-12">
									<div class="card-box">
										<div class="card-head">
											<header>Basic Information</header>
											
										</div>
										<div class="card-body row">
											<div class="col-lg-12 p-t-20">
												<div
													class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
													<input type="hidden"  id="modalID" name="modalID" class="mdl-textfield__input" >
													
												</div>
											</div>
										
											<div class="col-md-6 " >
														<label class="control-label col-md-3">Upload Image1
														</label>
														<div>
															<input type="file" style="width: 97%;" name="Image1" id="Image1" accept="image/*" class="dropzone">
															<img id="responseImage1" width="200px" height="150px" 
															style="padding-top: 6px; border-radius: 18px;">
														</div>
											  </div>

											<div class="col-md-6 " >
														<label class="control-label col-md-3">Upload Image2
														</label>
														<div>
															<input type="file" style="width: 97%;" name="Image2" id="Image2" accept="image/*" class="dropzone">
															<img id="responseImage2" width="200px" height="150px" 
															style="padding-top: 6px; border-radius: 18px;">
														</div>
											 </div>
											
											<div class="col-lg-6 p-t-20">
												<div
													class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
													<label >Head</label>
													<input class="mdl-textfield__input" id="head" name="head" type="text" >
													
												</div>
											</div>
											<div class="col-lg-6 p-t-20">
												<div
													class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
													<label>Title</label>
													<input class="mdl-textfield__input" id="title"  name="title" type="text" 
														id="title">
													
												</div>
											</div><div class="col-lg-6 p-t-20">
												<div
													class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
													<label for="aboutText" class="form-label">Description</label>
													<textarea name="Text" id="Text"></textarea>
													
												</div>
											</div>
											
											<div class="col-lg-6 p-t-20">
												<div
													class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
													<label >uploaded_date</label>
													<input class="mdl-textfield__input" name="date_uploaded" type="date"
														id="date_uploaded">
													
												</div>
												
											</div>
											<div class="col-lg-12 p-t-20 text-center">
												
											    <button type="submit" name="formSubmit" id="update"
													class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary">Update <i class="fa fa-pencil"></i>
												</button>
												
											</div>
											
											
										</div>
									</div>
								</div>
							</div>
							</form>
						</div>
			 		</div>
		       	</div>
			       	<!-- model ends -->
			</div>
		</div>
	
			<!-- end page content -->
			
		</div>
		<!-- end page container -->
		<!-- start footer -->
		<?php include("include/footer.php"); ?>
		<!-- end footer -->
	</div>
	<!-- start js include path -->
	<script src="../assets/plugins/jquery/jquery.min.js"></script>
	<script src="../assets/plugins/popper/popper.js"></script>
	<script src="../assets/plugins/jquery-blockui/jquery.blockui.min.js"></script>
	<script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
	<script src="../assets/plugins/feather/feather.min.js"></script>
	<!-- bootstrap -->
	<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="../assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
	<!-- Common js-->
	<script src="../assets/js/app.js"></script>
	<script src="../assets/js/layout.js"></script>
	<script src="../assets/js/theme-color.js"></script>
	<!-- Material -->
	<script src="../assets/plugins/material/material.min.js"></script>
	<!-- datatable -->
 	
    <script src="../datatable/js/datatables.min.js"></script>
    <script src="../datatable/js/pdfmake.min.js"></script>
    <script src="../datatable/js/vfs_fonts.js"></script>
    <script src="../datatable/js/custom.js"></script>
    	<!-- dropzone -->
	<script src="../assets/plugins/dropzone/dropzone.js"></script>
	<script src="../assets/plugins/dropzone/dropzone-call.js"></script>
	



	

	<script type="text/javascript">


$(document).on("click touch", ".tblEditBtn", function () {
      var dataId = $(this).data('id');
      $('#modalID').val(dataId);

      $.ajax({
         type: "POST", 
         dataType: "json", 
         url: "xhr/fetch_seedmission.php", 
         data: {
            dataId:dataId         
         },
         success: function(response){
         	// var keyed = response.head.replace(/<br ?\/?>/g,"\n");
    		// $("#head").val(keyed);
    		// var keyed = response.title.replace(/<br ?\/?>/g,"\n");
    		// $("#title").val(keyed);
    		// var keyed = response.description.replace(/<br ?\/?>/g,"\n");
    		// $("#description").val(keyed);
    		// var keyed = response.date_uploaded.replace(/<br ?\/?>/g,"\n");
    		// $("#date_uploaded").val(keyed);
    		// $('#deletePortfolio').attr("href","form/delete-portfolio.php?id="+dataId);
            $('#head').val(response.head);
			$('#title').val(response.title);
			$('#date_uploaded').val(response.date_uploaded);
			if(globalEditor){
				globalEditor.setData(response.description);
			}
            $('#responseImage1').attr("src",response.image1);
			$('#responseImage2').attr("src",response.image2);
         },
         error: function(error){
            console.log("Error:");
            console.log(error);
         }

      });
      
   });

   $('#update').click(function(e){
      e.preventDefault();
	  var id=$('#modalID').val();
	  var image1=$('#Image1')[0].files[0];
	  var image2=$('#Image2')[0].files[0];
	  if(globalEditor){
		var text=globalEditor.getData();
	  }
	  var date=$('#date_uploaded').val();
	  var head=$('#head').val();
	  var title=$('#title').val();

	  var formData=new FormData();
	  formData.append('image1',image1);
	  formData.append('image2',image2);
	  formData.append('text',text);
	  formData.append('date',date);
	  formData.append('head',head);
	  formData.append('title',title);
	  formData.append('id',id);
	  $.ajax({
        type: "POST",
		processData: false,
		contentType: false,
		cache: false,
		dataType: "json",
		url: "form/edit_seedmission.php",
		mimeType: 'multipart/form-data',
		data: formData,
		success: function (response) {
			$('#model4').hide();
			if (response.successMessage) {
				// showSuccessMessage ();
				// alert("DSA");
				Swal.fire({
				title: "SuccessFull !",
				text: response.successMessage,
				icon: "success"
				});
				setTimeout(function () {
					window.location.reload();
				}, 1000);

			} else if (response.errorMessage) {
				Swal.fire({
				title: "Error !",
				text: response.errorMessage,
				icon: "error"
				});
			}

		},
		error: function (error) {
			Swal.fire({
				title: "Error !",
				text: "something went wrong !",
				icon: "error"
			});
		}
	  })
   })

   $('.delete').click(function(){
	var id=$(this).data('id');
	if(confirm("do you want to delete this data ?")){
		$.ajax({
			type:"post",
			dataType:"json",
			url:"form/delete_seedmission.php",
			data:{dataId:id},
			success: function (response) {
			if (response.successMessage) {
				// showSuccessMessage ();
				// alert("DSA");
				Swal.fire({
				title: "SuccessFull !",
				text: response.successMessage,
				icon: "success"
				});
				setTimeout(function () {
					window.location.reload();
				}, 1000);

			} else if (response.errorMessage) {
				Swal.fire({
				title: "Error !",
				text: response.errorMessage,
				icon: "error"
				});
			}

		},
		error: function (error) {
			Swal.fire({
				title: "Error !",
				text: "something went wrong !",
				icon: "error"
			});
		}
		})
	}
   })

   function readURL1(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#responseImage1').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  } else {
    $('#responseImage1').attr('src', '');
  }
}

$("#Image1").change(function() {
  readURL1(this);
});

function readURL2(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#responseImage2').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  } else {
    $('#responseImage2').attr('src', '');
  }
}

$("#Image2").change(function() {
  readURL2(this);
});

</script>

	

</body>



</html>