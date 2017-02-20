<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://ianua.imagewize.com
 * @since      1.0
 *
 * @package    Ianua_Projects
 * @subpackage Ianua_Projects/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the Ianua Projects, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ianua_Projects
 * @subpackage Ianua_Projects/public
 * @author     Your Name <email@example.com>
 */
class Ianua_Projects_Public {

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
	 * @param      string    $Ianua_Projects       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $Ianua_Projects, $version ) {

		$this->Ianua_Projects = $Ianua_Projects;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->Ianua_Projects, plugin_dir_url( __FILE__ ) . 'css/ianua-projects-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->Ianua_Projects, plugin_dir_url( __FILE__ ) . 'js/ianua-projects-public.js', array( 'jquery' ), $this->version, false );

	}

	// create shortcode to list all clothes which come in blue
	// add_shortcode( 'list-posts-basic', 'ianua_post_listing_shortcode' );
	static function ianua_post_listing_shortcode( $atts ) {
	    ob_start();
	    $query = new WP_Query( array(
	        'post_type' => 'ianua_projects',
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

			    </div> <!-- /row-intro -->

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
			                  <a href="<?php the_permalink(); ?> ">
				                 <?php
				                 if ( has_post_thumbnail() ) {
				                  echo get_the_post_thumbnail( $post->ID, 'projects'); //add_image_size('projects', 287, 295);
				                  } ?>

								<!-- <img src="images/portfolio/puremedia.jpg" alt="Puremedia"> -->
			                     <div class="overlay"></div>                       
			                     <div class="portfolio-item-meta">
			     					      <h5><?php the_title(); ?></h5>
			                        <p>Wordpress</p>
			     					   </div> 
			                     <div class="link-icon"><i class="fa fa-plus"></i></div>
			                  </a>
			               </div> <!--/item-wrap -->
			        	</div> <!-- /folio-item -->
				    </div> <!--/portfolio-wrapper -->
			</div> <!-- /row-items -->
		</div> <!-- /project-list -->
			            <?php endwhile;
			            wp_reset_postdata(); ?>
			    <?php $myvariable = ob_get_clean();
			    return $myvariable;
	    };
	}

	function ianua_projects_register_shortcodes() { //https://developer.wordpress.org/reference/functions/add_shortcode/
		add_shortcode( 'ianua-projects', array('Ianua_Projects_Public', 'ianua_post_listing_shortcode' ));
	}

}
