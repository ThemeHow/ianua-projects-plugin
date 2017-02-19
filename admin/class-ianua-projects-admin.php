<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://ianua.imagewize.com
 * @since      1.0.0
 *
 * @package    Ianua_Projects
 * @subpackage Ianua_Projects/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the Ianua Projects, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ianua_Projects
 * @subpackage Ianua_Projects/admin
 * @author     Your Name <jasper@imagewize.com>
 */
class Ianua_Projects_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $Ianua_Projects    The ID of this plugin.
	 */
	private $Ianua_Projects;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $Ianua_Projects       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $Ianua_Projects, $version ) {

		$this->Ianua_Projects = $Ianua_Projects;
		$this->version = $version;

	}

		// Register Custom Taxonomy
		function ianua_projects_taxonomy() {

			$labels = array(
				'name'                       => _x( 'Project Categories', 'Taxonomy General Name', 'ianua-projects' ),
				'singular_name'              => _x( 'Project Category', 'Taxonomy Singular Name', 'ianua-projects' ),
				'menu_name'                  => __( 'Project Categories', 'ianua-projects' ),
				'all_items'                  => __( 'All Items', 'ianua-projects' ),
				'parent_item'                => __( 'Parent Item', 'ianua-projects' ),
				'parent_item_colon'          => __( 'Parent Item:', 'ianua-projects' ),
				'new_item_name'              => __( 'New Project Category Name', 'ianua-projects' ),
				'add_new_item'               => __( 'Add New Project Category', 'ianua-projects' ),
				'edit_item'                  => __( 'Edit Project Category', 'ianua-projects' ),
				'update_item'                => __( 'Update Project Category', 'ianua-projects' ),
				'view_item'                  => __( 'View Project Category', 'ianua-projects' ),
				'separate_items_with_commas' => __( 'Separate categories with commas', 'ianua-projects' ),
				'add_or_remove_items'        => __( 'Add or remove categories', 'ianua-projects' ),
				'choose_from_most_used'      => __( 'Choose from the most used', 'ianua-projects' ),
				'popular_items'              => __( 'Popular Categories', 'ianua-projects' ),
				'search_items'               => __( 'Search Categories', 'ianua-projects' ),
				'not_found'                  => __( 'Not Found', 'ianua-projects' ),
				'no_terms'                   => __( 'No categories', 'ianua-projects' ),
				'items_list'                 => __( 'Categories list', 'ianua-projects' ),
				'items_list_navigation'      => __( 'Categories list navigation', 'ianua-projects' ),
			);

			$args = array(
				'labels'                     => $labels,
				'hierarchical'               => true,
				'public'                     => true,
				'show_ui'                    => true,
				'show_admin_column'          => true,
				'show_in_nav_menus'          => true,
				'show_tagcloud'              => true,
				'rewrite'                    => true,
			);
			register_taxonomy( 'project-categories', array( 'ianua_projects' ), $args );

		}
	
	//add_action( 'init', 'ianua_projects_taxonomy', 0 );


	// Register Custom Post Type
	// 
	function ianua_projects_cpt() {

		$labels = array(
			'name'                  => _x( 'Projects', 'Post Type General Name', 'ianua-projects' ),
			'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'ianua-projects' ),
			'menu_name'             => __( 'Projects', 'ianua-projects' ),
			'name_admin_bar'        => __( 'Project', 'ianua-projects' ),
			'archives'              => __( 'Projects Archives', 'ianua-projects' ),
			'attributes'            => __( 'Projects Attributes', 'ianua-projects' ),
			'parent_item_colon'     => __( 'Parent Project:', 'ianua-projects' ),
			'all_items'             => __( 'All Projects', 'ianua-projects' ),
			'add_new_item'          => __( 'Add New Project', 'ianua-projects' ),
			'add_new'               => __( 'Add New', 'ianua-projects' ),
			'new_item'              => __( 'New Project', 'ianua-projects' ),
			'edit_item'             => __( 'Edit Project', 'ianua-projects' ),
			'update_item'           => __( 'Update Project', 'ianua-projects' ),
			'view_item'             => __( 'View Project', 'ianua-projects' ),
			'view_items'            => __( 'View Projects', 'ianua-projects' ),
			'search_items'          => __( 'Search Project', 'ianua-projects' ),
			'not_found'             => __( 'Not found', 'ianua-projects' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'ianua-projects' ),
			'featured_image'        => __( 'Featured Image', 'ianua-projects' ),
			'set_featured_image'    => __( 'Set featured image', 'ianua-projects' ),
			'remove_featured_image' => __( 'Remove featured image', 'ianua-projects' ),
			'use_featured_image'    => __( 'Use as featured image', 'ianua-projects' ),
			'insert_into_item'      => __( 'Insert into project', 'ianua-projects' ),
			'uploaded_to_this_item' => __( 'Uploaded to this project', 'ianua-projects' ),
			'items_list'            => __( 'Projects list', 'ianua-projects' ),
			'items_list_navigation' => __( 'Projects list navigation', 'ianua-projects' ),
			'filter_items_list'     => __( 'Filter project list', 'ianua-projects' ),
		);
		$rewrite = array(
			'slug'                  => 'project',
			'with_front'            => true,
			'pages'                 => true,
			'feeds'                 => true,
		);
		$args = array(
			'label'                 => __( 'Project', 'ianua-projects' ),
			'description'           => __( 'Portfolio Plugin to show off your latest work', 'ianua-projects' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', ),
			'taxonomies'            => array( 'project-categories', 'post_tag' ),
			'hierarchical'          => true,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-portfolio',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false, // no index or archive		
			'exclude_from_search'   => false,
			'publicly_queryable'    => false, // no single cpts
			'rewrite'               => $rewrite,
			'capability_type'       => 'page',
			'show_in_rest'          => false,
		);
		register_post_type( 'ianua_projects', $args );

	}
	//add_action( 'init', 'ianua_projects_cpt', 0 );

	// create shortcode to list all clothes which come in blue
	// add_shortcode( 'list-posts-basic', 'ianua_post_listing_shortcode' );
	static function ianua_post_listing_shortcode( $atts ) {
	    ob_start();
	    $query = new WP_Query( array(
	        'post_type' => 'ianua_projects',
	        //'color' => 'blue',
	        'posts_per_page' => -1,
	        'order' => 'ASC',
	        'orderby' => 'title',
	    ) );
	    if ( $query->have_posts() ) { ?>
	        <div id="content" class="project-list"> 

			   	<div class="row project-intro">

			   		<div class="twelve columns">

			   			<h1>Our Works.</h1>

			   			<p class="lead">Lorem ipsum Officia elit ad tempor dolore est ex incididunt incididunt occaecat culpa deserunt sunt labore in cillum ullamco magna in Excepteur consequat in reprehenderit proident mollit incididunt officia. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.fugiat ut enim nisi dolor quis laborum nostrud deserunt quis laboris.</p>  						

			   		</div>

			    </div>

	         	<div class="row items">

		     		<div class="project-filter">
		     			<ul class="filter-group">		
							<li><a href="#" data-filter="*" class="active">All</a></li>
							<li><a href="#" data-filter=".iw-wordpress" >Wordpress</a></li>
							<li><a href="#" data-filter=".iw-webdesign">Webdesign</a></li>
							<li><a href="#" data-filter=".iw-branding">Branding</a></li>
							<li><a href="#" data-filter=".iw-seo">SEO</a></li>
						</ul>
		     			
		     		</div>
		    <div id="portfolio-wrapper" class="iw-projects bgrid-third tab-bgrid-half stack">
	        <?php while ( $query->have_posts() ) : $query->the_post();global $post;?>
	        
			         	<div class="bgrid folio-item <?php $posttags = get_the_tags();
													if ($posttags) {
													  foreach($posttags as $tag) {
													    echo $tag->name . ' '; 
													  }
													};?>">
			               <div class="item-wrap">
			                  <a href="portfolio-single.html">
				                 <?php
				                 if ( has_post_thumbnail() ) {
				                  echo get_the_post_thumbnail( $post->ID, 'medium', array( 'class' => 'alignleft' ) );
				                  } ?>

								<!-- <img src="images/portfolio/puremedia.jpg" alt="Puremedia"> -->
			                     <div class="overlay"></div>                       
			                     <div class="portfolio-item-meta">
			     					      <h5><?php the_title(); ?></h5>
			                        <p>Wordpress</p>
			     					   </div> 
			                     <div class="link-icon"><i class="fa fa-plus"></i></div>
			                  </a>
			               </div>
			        	</div> <!-- /folio-item -->
			    </div>
			</div>
		</div>
			            <?php endwhile;
			            wp_reset_postdata(); ?>
			    <?php $myvariable = ob_get_clean();
			    return $myvariable;
	    };
	}

	function ianua_projects_register_shortcodes() { //https://developer.wordpress.org/reference/functions/add_shortcode/
		add_shortcode( 'ianua-projects', array('Ianua_Projects_Admin', 'ianua_post_listing_shortcode' ));
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ianua_Projects_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ianua_Projects_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->Ianua_Projects, plugin_dir_url( __FILE__ ) . 'css/ianua-projects-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ianua_Projects_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ianua_Projects_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->Ianua_Projects, plugin_dir_url( __FILE__ ) . 'js/ianua-projects-admin.js', array( 'jquery' ), $this->version, false );

	}





}
