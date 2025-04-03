<link rel="stylesheet" href="<?php echo base_url('assets') ?>/vendor\bootstrap-treeview/bootstrap-treeview.min.css">

<pre>
<?php 
print_r($map);
?>
</pre>
<div class="page-header">
    <h1 class="page-title"><?php echo lang('gateways'); ?></h1>
    <ol class="breadcrumb">
      	<li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      	<li class="breadcrumb-item active"><a href="#"><?php echo lang('gateways'); ?></a></li>
    </ol>
    <div class="page-header-actions">
      	
		<a href="#" id="create-Gateway-button" class="btn btn-sm btn-primary btn-outline btn-round"  title="<?php echo lang('general_create'); ?>">
			<i class="icon wb-plus" aria-hidden="true"></i>
        	<span class="hidden-sm-down">Create</span>
		</a>

    </div>
</div>


<div class="page-content">
  	
</div>

<!-------------------------------------------------------------------------------------------------->

<!-- Main content -->
<div class="page-content">
	<div class="panel">
		<header class="panel-heading">
		</header>
	  	<div class="panel-body row">
	  		<?php /*<div class="col-md-3">
				<div class="page-aside-inner page-aside-scroll">
				  	<div data-role="container">
				        <div data-role="content">
				          	<section class="page-aside-section">
				            	<h4 class="page-aside-title">Code Editor</h4>
				            	<div id="filesTree"></div>
				            	<!-- Your custom menu with dropdown-menu as default styling -->
				          	</section>
				        </div>
				  	</div>
				</div>
			</div>*/?>


	        <div class="page-aside-inner page-aside-scroll col-md-3">
		        <!-- <div class="page-aside-switch">
		          	<i class="icon wb-chevron-left" aria-hidden="true"></i>
		          	<i class="icon wb-chevron-right" aria-hidden="true"></i>
		        </div> -->
			  	<div data-role="container">
			        <div data-role="content page-aside-inner page-aside-scroll">
			          	<section class="page-aside-section">
			            	<h4 class="page-aside-title">Code Editor</h4>
			            	<div id="my_tree"></div>
			            	<h4 class="page-aside-title">test tree view</h4>
			            	<div id="filesTree"></div>
			            	<!-- Your custom menu with dropdown-menu as default styling -->
			          	</section>
			        </div>
			  	</div>
			</div>
			<div class="col-md-9">
				<div class="page-content">
			      	<textarea id="code1">test</textarea>
			    </div>
			</div>
		</div>
	</div>
</div>

<link rel="stylesheet" href="<?php echo base_url('assets')?>/vendor/jquery-contextmenu/jquery.contextMenu.css">
<link rel="stylesheet" href="<?php echo base_url('assets')?>/vendor/bootstrap-treeview/bootstrap-treeview.css">
<link rel="stylesheet" href="<?php echo base_url('assets')?>/vendor/codemirror/codemirror.css">
<link rel="stylesheet" href="<?php echo base_url('assets')?>/vendor/codemirror/addon/scroll/simplescrollbars.css">
<link rel="stylesheet" href="<?php echo base_url('assets')?>/vendor/jquery-contextmenu/jquery.contextMenu.css">
<!-- <link rel="stylesheet" href="../../assets/examples/css/pages/code-editor.css"> -->

<!-- <script src="<?php echo base_url('assets')?>/vendor/bootstrap-treeview/bootstrap-treeview.min.js"></script> -->
<script src="<?php echo base_url('assets')?>/vendor/codemirror/codemirror.js"></script>
<script src="<?php echo base_url('assets')?>/vendor/codemirror/addon/scroll/simplescrollbars.js"></script>
<script src="<?php echo base_url('assets')?>/vendor/codemirror/mode/xml/xml.js"></script>
<script src="<?php echo base_url('assets')?>/vendor/codemirror/mode/css/css.js"></script>
<script src="<?php echo base_url('assets')?>/vendor/codemirror/mode/htmlmixed/htmlmixed.js"></script>
<script src="<?php echo base_url('assets')?>/vendor/jquery-contextmenu/jquery.contextMenu.js"></script>


<script type="text/javascript">

	var data = [{
      text: 'assets',
      href: '#assets',
      state: {
        expanded: false
      },
      nodes: [{
        text: 'css',
        href: '#css',
        nodes: [{
          text: 'bootstrap.css',
          href: '#bootstrap.css',
          icon: 'fa fa-file-code-o'
        }, {
          text: 'site.css',
          href: '#site.css',
          icon: 'fa fa-file-code-o'
        }]
      }, {
        text: 'fonts',
        href: '#fonts',
        nodes: [{
          text: 'font-awesome',
          href: '#font-awesome'
        }, {
          text: 'web-icons',
          href: '#web-icons'
        }]
      }, {
        text: 'images',
        href: '#images',
        nodes: [{
          text: 'logo.png',
          href: '#logo.png',
          icon: 'fa fa-file-photo-o'
        }, {
          text: 'bg.png',
          href: '#bg.png',
          icon: 'fa fa-file-photo-o'
        }]
      }]
    }, {
      text: 'grunt',
      href: '#grunt',
      state: {
        expanded: false
      },
      nodes: [{
        text: 'autoprefixer.js',
        href: '#autoprefixer.js',
        icon: 'fa fa-file-code-o'
      }, {
        text: 'clean.js',
        href: '#clean.js',
        icon: 'fa fa-file-code-o'
      }, {
        text: 'concat.js',
        href: '#concat.js',
        icon: 'fa fa-file-code-o'
      }, {
        text: 'csscomb.js',
        href: '#csscomb.js',
        icon: 'fa fa-file-code-o'
      }, {
        text: 'cssmin.js',
        href: '#cssmin.js',
        icon: 'fa fa-file-code-o'
      }, {
        text: 'less.js',
        href: '#less.js',
        icon: 'fa fa-file-code-o'
      }, {
        text: 'uglify.js',
        href: '#uglify.js',
        icon: 'fa fa-file-code-o'
      }]
    }, {
      text: 'html',
      href: '#html',
      state: {
        expanded: true
      },
      nodes: [{
        text: 'blog.html',
        href: '#blog.html',
        icon: 'fa fa-file-code-o'
      }, {
        text: 'docs.html',
        href: '#docs.html',
        icon: 'fa fa-file-code-o'
      }, {
        text: 'index.html',
        href: '#index.html',
        state: {
          selected: true
        },
        icon: 'fa fa-file-code-o'
      }]
    }, {
      text: 'media',
      href: '#media',
      state: {
        expanded: false
      },
      nodes: [{
        text: 'audio.mp3',
        href: '#audio.mp3',
        icon: 'fa fa-file-audio-o'
      }, {
        text: 'video.mp4',
        href: '#video.mp4',
        icon: 'fa fa-file-video-o'
      }]
    }, {
      text: 'Gruntfile.js',
      href: '#Gruntfile.js',
      icon: 'fa fa-file-code-o'
    }, {
      text: 'bower.json',
      href: '#bower.json',
      icon: 'fa fa-file-code-o'
    }, {
      text: 'README.pdf',
      href: '#README.pdf',
      icon: 'fa fa-file-pdf-o'
    }, {
      text: 'package.json',
      href: '#package.json',
      icon: 'fa fa-file-code-o'
    }];
    // var defaults = Plugin.getDefaults("treeview");

    var options = {
      levels: 1,
      color: false,
      backColor: false,
      borderColor: false,
      onhoverColor: false,
      selectedColor: false,
      selectedBackColor: false,
      searchResultColor: false,
      searchResultBackColor: false,
      data: data,
      highlightSelected: true
    };

    var code_editor_options = {
	    lineNumbers: !0,
	    theme: 'eclipse',
	    mode: 'text/html',
	    scrollbarStyle: "simple"
  	};

  	var menu_options = {
  		items: (_items = {
	      	"rename": {
	        	name: "Rename ...",
	        	icon: function icon() {
	          		return 'context-menu-icon context-menu-extend-icon wb-pencil';
	        	}
	      	},
	      	"search": {
	        	name: "Find in...",
	        	icon: function icon() {
	          		return 'context-menu-icon context-menu-extend-icon wb-search';
	        	}
	      	},
	      	"sep1": "---------",
	      	"new": {
	        	name: "New File",
	        	icon: function icon() {
	          		return 'context-menu-icon context-menu-extend-icon wb-file';
	        	}
	      	},
	      	"new-folder": {
	        	name: "New Folder",
        		icon: function icon() {
	          		return 'context-menu-icon context-menu-extend-icon wb-folder';
	        	}
	      	}
    	}, babelHelpers.defineProperty(_items, "sep1", "---------"), babelHelpers.defineProperty(_items, "delete", {
	      	name: "Delete",
	      	icon: function icon() {
	        	return 'context-menu-icon context-menu-extend-icon wb-close';
	      	}
	    }), _items),
	    selector: '#my_tree',
  	}
	$(function(){
		var mytree = [
            {
                text: "Parent 1",
                nodes: [
                    {
                        text: "Child 1",
                        nodes: [
                            {
                                text: "Grandchild 1"
                            },
                            {
                                text: "Grandchild 2"
                            }
                        ]
                    },
                    {
                        text: "Child 2"
                    }
                ]
            },
            {
                text: "Parent 2"
            }
        ];
		// $('#test').treeview({
		// 	data:mytree,
		// });
		$('#my_tree').treeview({
		  	data: mytree,         // data is not optional
		});
		CodeMirror.fromTextArea(document.getElementById('code1'),code_editor_options);
		$.contextMenu(menu_options);
	});
</script>
