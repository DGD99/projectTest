<?php
        $con=mysqli_connect("localhost","root","TEst!234","sqldb") or die("접속실패");

	session_start();

	$username = $_SESSION["username"];

        $sql="SELECT filename, filesize FROM filetbl where username = '$username' ";

        $ret = mysqli_query($con,$sql);

	
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Cactus Drive | Responsive Bootstrap 4 Admin Dashboard Template</title>
      
      <!-- Favicon -->
      <link rel="shortcut icon" href="../assets/images/favicon.ico" />
      
      <link rel="stylesheet" href="../assets/css/backend-plugin.min.css">
      <link rel="stylesheet" href="../assets/css/backend.css?v=1.0.0">
      
      <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
      <link rel="stylesheet" href="../assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
      <link rel="stylesheet" href="../assets/vendor/remixicon/fonts/remixicon.css">
      
      <!-- Viewer Plugin -->
        <!--PDF-->
        <link rel="stylesheet" href="../assets/vendor/doc-viewer/include/pdf/pdf.viewer.css">
        <!--Docs-->
        <!--PPTX-->
        <link rel="stylesheet" href="../assets/vendor/doc-viewer/include/PPTXjs/css/pptxjs.css">
        <link rel="stylesheet" href="../assets/vendor/doc-viewer/include/PPTXjs/css/nv.d3.min.css">
        <!--All Spreadsheet -->
        <link rel="stylesheet" href="../assets/vendor/doc-viewer/include/SheetJS/handsontable.full.min.css">
        <!--Image viewer-->
        <link rel="stylesheet" href="../assets/vendor/doc-viewer/include/verySimpleImageViewer/css/jquery.verySimpleImageViewer.css">
        <!--officeToHtml-->
        <link rel="stylesheet" href="../assets/vendor/doc-viewer/include/officeToHtml/officeToHtml.css">  </head>
  <body class="  ">
    <!-- loader Start -->
    <div id="loading">
          <div id="loading-center">
          </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">
      <div class="iq-sidebar  sidebar-default ">
          <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
              <a href="index.html" class="header-logo">
                  <h2>Cactus Drive</h2>
               </a>
              <div class="iq-menu-bt-sidebar">
                  <i class="las la-bars wrapper-menu"></i>
              </div>
          </div>
          <div class="data-scrollbar" data-scroll="1">
              <div class="new-create select-dropdown input-prepend input-append">
                  <div class="btn-group">
                      <div data-toggle="dropdown">
                      <div class="search-query selet-caption"><i class="las la-plus pr-2"></i>Create New</div><span class="search-replace"></span>
                      <span class="caret"></span>
                      </div>
                      <ul class="dropdown-menu">
                          <li><div class="item"><i class="ri-folder-add-line pr-3"></i>New Folder</div></li>
                        <form action="file_result.php" method="post" enctype="multipart/form-data" id="fileform" >
                            <input type="file" name="file" id="file-upload-input" style="display: none;" multiple>
                          <li><div class="item ri-file-upload-line2"><i class="ri-file-upload-line pr-3"></i>Upload Files</div></li>
                        </form>
                        <form action="http://localhost/upload.php" method="post" enctype="multipart/form-data" >
                            <input type="file" name="folder" webkitdirectory directory multiple style="display: none;">
                            <!-- <input type="submit" style="display: none;"> -->
                          <li><div class="item"><i class="ri-folder-upload-line pr-3"></i>Upload Folders</div></li>
                        </form>
                      </ul>
                  </div>
              </div>
              <nav class="iq-sidebar-menu">
                  <ul id="iq-sidebar-toggle" class="iq-menu">
                       <li class=" ">
                              <a href="../backend/index.html" class="">
                                  <i class="las la-home iq-arrow-left"></i><span>Dashboard</span>
                              </a>
                          <ul id="dashboard" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                          </ul>
                       </li>
                       <li class=" ">
                          <a href="#mydrive" class="collapsed" data-toggle="collapse" aria-expanded="false">
                              <i class="las la-hdd"></i><span>My Drive</span>
                              <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                              <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                          </a>
                          <ul id="mydrive" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                  <li class="active">
                                          <a href="../backend/page-alexa.php">
                                              <i class="las la-folder"></i><span><?php echo $_SESSION["username"]; ?></span>
                                          </a>
                                  </li>
                          </ul>
                       </li>
                       <li class=" ">
                              <a href="../backend/page-delete.html" class="">
                                  <i class="las la-trash-alt iq-arrow-left"></i><span>Trash</span>
                              </a>
                       </li>
                          </ul>
                       </li>
                  </ul>
              </nav>
              <div class="sidebar-bottom">
                  <h4 class="mb-3"><i class="las la-cloud mr-2"></i>Storage</h4>
                  <p>17.1 / 20 GB Used</p>
                  <div class="iq-progress-bar mb-3">
                      <span class="bg-primary iq-progress progress-1" data-percent="67">
                      </span>
                  </div>
                  <p>75% Full - 3.9 GB Free</p>
                  <a href="#" class="btn btn-outline-primary view-more mt-4">Buy Storage</a>
              </div>
              <div class="p-3"></div>
          </div>
          </div>       <div class="iq-top-navbar">
          <div class="iq-navbar-custom">
              <nav class="navbar navbar-expand-lg navbar-light p-0">
              <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                  <i class="ri-menu-line wrapper-menu"></i>
                  <a href="index.html" class="header-logo">
                      <h2>Cactus Drive</h2>
                  </a>
              </div>
                  <div class="iq-search-bar device-search">
                      
                      <form>
                          <div class="input-prepend input-append">
                              <div class="btn-group">
                                  <label class="dropdown-toggle searchbox" data-toggle="dropdown">
                                  <input class="dropdown-toggle search-query text search-input" type="text"  placeholder="Type here to search..."><span class="search-replace"></span>
                                  <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                                  <span class="caret"><!--icon--></span>
                                  </label>
                                  <ul class="dropdown-menu">
                                      <li><a href="#"><div class="item"><i class="far fa-file-pdf bg-info"></i>PDFs</div></a></li>
                                      <li><a href="#"><div class="item"><i class="far fa-file-alt bg-primary"></i>Documents</div></a></li>
                                      <li><a href="#"><div class="item"><i class="far fa-file-excel bg-success"></i>Spreadsheet</div></a></li>
                                      <li><a href="#"><div class="item"><i class="far fa-file-powerpoint bg-danger"></i>Presentation</div></a></li>
                                      <li><a href="#"><div class="item"><i class="far fa-file-image bg-warning"></i>Photos & Images</div></a></li>
                                      <li><a href="#"><div class="item"><i class="far fa-file-video bg-info"></i>Videos</div></a></li>
                                  </ul>
                              </div>
                          </div>
                      </form>
                  </div>
      
                  <div class="d-flex align-items-center">
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-label="Toggle navigation">
                      <i class="ri-menu-3-line"></i>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav ml-auto navbar-list align-items-center">
                          <li class="nav-item nav-icon search-content">
                              <a href="#" class="search-toggle rounded" id="dropdownSearch" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="ri-search-line"></i>
                              </a>
                              <div class="iq-search-bar iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownSearch">
                                  <form action="#" class="searchbox p-2">
                                      <div class="form-group mb-0 position-relative">
                                      <input type="text" class="text search-input font-size-12" placeholder="type here to search...">
                                      <a href="#" class="search-link"><i class="las la-search"></i></a> 
                                      </div>
                                  </form>
                              </div>
                          </li> 
                          <li class="nav-item nav-icon dropdown">
                              <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="ri-question-line"></i>
                              </a>
                              <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton01">
                                  <div class="card shadow-none m-0">
                                      <div class="card-body p-0 ">
                                          <div class="p-3">
                                              <a href="#" class="iq-sub-card pt-0"><i class="ri-questionnaire-line"></i>Help</a>
                                              <a href="#" class="iq-sub-card"><i class="ri-recycle-line"></i>Training</a>
                                              <a href="#" class="iq-sub-card"><i class="ri-refresh-line"></i>Updates</a>
                                              <a href="#" class="iq-sub-card"><i class="ri-service-line"></i>Terms and Policy</a>
                                              <a href="#" class="iq-sub-card"><i class="ri-feedback-line"></i>Send Feedback</a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </li>
                          <li class="nav-item nav-icon dropdown"> 
                              <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                              <i class="ri-settings-3-line"></i>
                              </a>
                              <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton02">
                                  <div class="card shadow-none m-0">
                                      <div class="card-body p-0 ">
                                          <div class="p-3">
                                              <a href="#" class="iq-sub-card pt-0"><i class="ri-settings-3-line"></i> Settings</a>
                                              <a href="#" class="iq-sub-card"><i class="ri-hard-drive-line"></i> Get Drive for desktop</a>
                                              <a href="#" class="iq-sub-card"><i class="ri-keyboard-line"></i> Keyboard Shortcuts</a>
                                          </div>                                
                                      </div>
                                  </div>
                              </div>
                          </li>
                          <li class="nav-item nav-icon dropdown caption-content">
                              <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                  <div class="caption bg-primary line-height">P</div>
                              </a>
                              <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton03">
                                  <div class="card mb-0">
                                      <div class="card-header d-flex justify-content-between align-items-center mb-0">
                                      <div class="header-title">
                                          <h4 class="card-title mb-0">Profile</h4>
                                      </div>
                                      <div class="close-data text-right badge badge-primary cursor-pointer "><i class="ri-close-fill"></i></div>
                                      </div>
                                      <div class="card-body">
                                          <div class="profile-header">
                                              <div class="cover-container text-center">
                                                  <div class="rounded-circle profile-icon bg-primary mx-auto d-block">
                                                      P                                                    
                                                      <a href="">
                                                          
                                                      </a>
                                                  </div>
                                                  <div class="profile-detail mt-3">
                                                  <h5><a href="../app/user-profile-edit.html"><?php echo $_SESSION["username"] ?></a></h5>
                                                  <p><?php echo $_SESSION["useremail"] ?></p>
                                                  </div>
                                                  <a href="auth-sign-in.html" class="btn btn-primary">Sign Out</a>
                                              </div>
                                              <div class="profile-details mt-4 pt-4 border-top">
                                                  <div class="media align-items-center mb-3">
                                                      <div class="rounded-circle iq-card-icon-small bg-primary">
                                                          A
                                                      </div>
                                                      <div class="media-body ml-3">
                                                          <div class="media justify-content-between">
                                                              <h6 class="mb-0">Anna Mull</h6>
                                                              <p class="mb-0 font-size-12"><i>Signed Out</i></p>
                                                          </div>
                                                          <p class="mb-0 font-size-12">annamull@gmail.com</p>
                                                      </div>                                                 
                                                  </div>
                                                  <div class="media align-items-center mb-3">
                                                      <div class="rounded-circle iq-card-icon-small bg-success">
                                                          K
                                                      </div>
                                                      <div class="media-body ml-3">
                                                          <div class="media justify-content-between">
                                                              <h6 class="mb-0">King Poilin</h6>
                                                              <p class="mb-0 font-size-12"><i>Signed Out</i></p>
                                                          </div>
                                                          <p class="mb-0 font-size-12">kingpoilin@gmail.com</p>
                                                      </div>
                                                  </div>
                                                  <div class="media align-items-center">
                                                      <div class="rounded-circle iq-card-icon-small bg-danger">
                                                          D
                                                      </div>
                                                      <div class="media-body ml-3">
                                                          <div class="media justify-content-between">
                                                              <h6 class="mb-0">Devid Worner</h6>
                                                              <p class="mb-0 font-size-12"><i>Signed Out</i></p>
                                                          </div>
                                                          <p class="mb-0 font-size-12">devidworner@gmail.com</p>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </li>
                          </ul>                     
                      </div> 
                  </div>
              </nav>
          </div>
      </div>
      <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                     <div class="d-flex align-items-center justify-content-between welcome-content mb-3">
                        <div class="navbar-breadcrumb">
                           <nav aria-label="breadcrumb">
                              <ul class="breadcrumb mb-0">
                                 <li class="breadcrumb-item"><a href="index.html">My Drive</a></li>
                                 <li class="breadcrumb-item active" aria-current="page">UserId</li>
                              </ul>
                           </nav>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="list-grid-toggle mr-4">
                                <span class="icon icon-grid i-grid"><i class="ri-layout-grid-line font-size-20"></i></span>
                                <span class="icon icon-grid i-list"><i class="ri-list-check font-size-20"></i></span>
                                <span class="label label-list">List</span>
                            </div>
                            <div class="dashboard1-dropdown d-flex align-items-center">
                                <div class="dashboard1-info rounded">
                                    <a href="#calander" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                        <i class="ri-arrow-down-s-line"></i>
                                    </a>
                                    <ul id="calander" class="iq-dropdown collapse list-inline m-0 p-0 mt-2">
                                        <li class="mb-2">
                                            <a href="#" data-toggle="tooltip" data-placement="right" title="Calander"><i
                                                    class="las la-calendar iq-arrow-left"></i></a>
                                        </li>
                                        <li class="mb-2">
                                            <a href="#" data-toggle="tooltip" data-placement="right" title="Keep"><i
                                                    class="las la-lightbulb iq-arrow-left"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="tooltip" data-placement="right" title="Tasks"><i
                                                    class="las la-tasks iq-arrow-left"></i></a>
                                        </li>                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
            <div class="icon i-grid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-block card-stretch card-transparent">
                            <div class="card-header d-flex justify-content-between pb-0">
                                <div class="header-title">
                                    <h4 class="card-title">Images</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body image-thumb ">
                                <div class="mb-4 text-center p-3 rounded iq-thumb">
                                    <a class="image-popup-vertical-fit" href="../assets/images/layouts/page-1/01.png">
                                        <img src="../assets/images/layouts/page-1/01.png" class="img-fluid" alt="images" />  
                                        <div class="iq-image-overlay"></div>
                                    </a>           
                                </div>
                                <h6>Alexa.jpeg</h6>          
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body image-thumb">
                                <div class="mb-4 text-center p-3 rounded iq-thumb">
                                    <a class="image-popup-vertical-fit" href="../assets/images/layouts/page-1/02.png">
                                        <img src="../assets/images/layouts/page-1/02.png" class="img-fluid" alt="images" />  
                                        <div class="iq-image-overlay"></div>
                                    </a>           
                                </div>
                                <h6>Eliminator.png</h6>          
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body image-thumb">
                                <div class="mb-4 text-center p-3 rounded iq-thumb">
                                    <a class="image-popup-vertical-fit" href="../assets/images/layouts/page-1/03.png">
                                        <img src="../assets/images/layouts/page-1/03.png" class="img-fluid" alt="images" />  
                                        <div class="iq-image-overlay"></div>
                                    </a>           
                                </div>
                                <h6>Screenshot.svg</h6>        
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body image-thumb">
                                <div class="mb-4 text-center p-3 rounded iq-thumb">
                                    <a class="image-popup-vertical-fit" href="../assets/images/layouts/page-1/04.png">
                                        <img src="../assets/images/layouts/page-1/04.png" class="img-fluid" alt="images" />  
                                        <div class="iq-image-overlay"></div>
                                        <div class="overlay-img-icon">
                                                <i class="las la-play-circle"></i>
                                        </div> 
                                    </a>           
                                </div>
                                <h6>Video.mp4</h6>            
                            </div>
                        </div>
                    </div>              
                    <div class="col-lg-12">
                        <div class="card card-block card-stretch card-transparent">
                            <div class="card-header d-flex justify-content-between pb-0">
                                <div class="header-title">
                                    <h4 class="card-title">Documents</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body image-thumb">
                                <div class="mb-4 text-center p-3 rounded iq-thumb">
                                    <div class="iq-image-overlay"></div>
                                    <a href="#" data-title="Mobile-plan.pdf" data-load-file="file" data-load-target="#resolte-contaniner" data-url="../assets/vendor/doc-viewer/files/demo.pdf" data-toggle="modal" data-target="#exampleModal"><img src="../assets/images/layouts/page-1/pdf.png" class="img-fluid" alt="image1"></a>         
                                </div>
                                <h6>Mobile-plan.pdf</h6>            
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body image-thumb">
                                <div class="mb-4 text-center p-3 rounded iq-thumb">
                                    <div class="iq-image-overlay"></div>
                                    <a href="#" data-title="Strategy.docx" data-load-file="file" data-load-target="#resolte-contaniner" data-url="../assets/vendor/doc-viewer/files/demo.docx" data-toggle="modal" data-target="#exampleModal"><img src="../assets/images/layouts/page-1/doc.png" class="img-fluid" alt="image1"></a>
                                </div>
                                <h6>Strategy.docx</h6>     
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body image-thumb">
                                <div class="mb-4 text-center p-3 rounded iq-thumb">
                                    <div class="iq-image-overlay"></div>
                                    <a href="#" data-title="Web.xlsx" data-load-file="file" data-load-target="#resolte-contaniner" data-url="../assets/vendor/doc-viewer/files/demo.xlsx" data-toggle="modal" data-target="#exampleModal"><img src="../assets/images/layouts/page-1/xlsx.png" class="img-fluid" alt="image1"></a>
                                </div>
                                <h6>Web.xlsx</h6> 
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body image-thumb">
                                <div class="mb-4 text-center p-3 rounded iq-thumb">
                                    <div class="iq-image-overlay"></div>
                                    <a href="#" data-title="Testing.pptx" data-load-file="file" data-load-target="#resolte-contaniner" data-url="../assets/vendor/doc-viewer/files/demo.pptx" data-toggle="modal" data-target="#exampleModal"><img src="../assets/images/layouts/page-1/ppt.png" class="img-fluid" alt="image1"></a>           
                                </div>
                                <h6>Testing.pptx</h6>          
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="icon i-list">
                <div class="row">
                    <div class="col-lg-12">                        
                        <div class="card card-block card-stretch card-transparent">
                            <div class="card-header d-flex justify-content-between pb-0">
                                <div class="header-title">
                                    <h4 class="card-title">list View</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-borderless tbl-server-info">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Owner</th>
                                            <th scope="col">Last Edit</th>
                                            <th scope="col">File Size</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
					<?php   // LOOP TILL END OF DATA
                                         while($rows=mysqli_fetch_assoc($ret))
                                        {
                                        ?>
                                        <tr>
                                             <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="mr-3">
                                                        <a href="#"><i class="las la-file la-2x"></i></a>
                                                    </div>
						    <a href="download.php?filename=<?php echo $rows['filename'];?>" target="_blank"><?php echo $rows['filename'];?>
                                                    </a>
                                                </div>
                                            </td>
                                           <td>Me</td>
                                            <td>jan 21, 2020 me</td>
                                            <td><?php echo $rows['filesize'];?> MB</td>
                                            <td>
                                                <div class="dropdown">
                                                    <span class="dropdown-toggle" id="dropdownMenuButton6" data-toggle="dropdown">
                                                        <i class="ri-more-fill"></i>
                                                    </span>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton6">
                                                        <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                                        <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                                        <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                                        <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                                        <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                         }
						mysqli_close($con);
                                        ?>
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
    <!-- Wrapper End-->
    <footer class="iq-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="../backend/privacy-policy.html">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="../backend/terms-of-service.html">Terms of Use</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 text-right">
                    <span class="mr-1"><script>document.write(new Date().getFullYear())</script>©</span> <a href="#" class="">CloudBOX</a>.
                </div>
            </div>
        </div>
    </footer>
    <!-- Backend Bundle JavaScript -->
    <script src="../assets/js/backend-bundle.min.js"></script>
    
    <!-- Chart Custom JavaScript -->
    <script src="../assets/js/customizer.js"></script>
    
    <!-- Chart Custom JavaScript -->
    <script src="../assets/js/chart-custom.js"></script>
    
    <!--PDF-->
    <script src="../assets/vendor/doc-viewer/include/pdf/pdf.js"></script>
    <!--Docs-->
    <script src="../assets/vendor/doc-viewer/include/docx/jszip-utils.js"></script>
    <script src="../assets/vendor/doc-viewer/include/docx/mammoth.browser.min.js"></script>
    <!--PPTX-->
    <script src="../assets/vendor/doc-viewer/include/PPTXjs/js/filereader.js"></script>
    <script src="../assets/vendor/doc-viewer/include/PPTXjs/js/d3.min.js"></script>
    <script src="../assets/vendor/doc-viewer/include/PPTXjs/js/nv.d3.min.js"></script>
    <script src="../assets/vendor/doc-viewer/include/PPTXjs/js/pptxjs.js"></script>
    <script src="../assets/vendor/doc-viewer/include/PPTXjs/js/divs2slides.js"></script>
    <!--All Spreadsheet -->
    <script src="../assets/vendor/doc-viewer/include/SheetJS/handsontable.full.min.js"></script>
    <script src="../assets/vendor/doc-viewer/include/SheetJS/xlsx.full.min.js"></script>
    <!--Image viewer-->
    <script src="../assets/vendor/doc-viewer/include/verySimpleImageViewer/js/jquery.verySimpleImageViewer.js"></script>
    <!--officeToHtml-->
    <script src="../assets/vendor/doc-viewer/include/officeToHtml/officeToHtml.js"></script>
    <script src="../assets/js/doc-viewer.js"></script>
    <!-- app JavaScript -->
    <script src="../assets/js/app.js"></script>
     <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Title</h4>
                    <div>
                        <a class="btn" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </a>
                    </div>
                </div>
                <div class="modal-body">
                    <div id="resolte-contaniner" style="height: 500px;" class="overflow-auto">
                        File not found
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>
