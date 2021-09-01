@extends('layouts.web.master')

@section('styles')

@endsection

@section('content')

<!-- #Main Content-->
<div id="main-content">
    <!-- Banner -->
    <div class="banner-post">
        <img src="{{ asset($post->feature_image) }}" alt="Hello world!">
    </div>
    <div class="section-post-details-one">
        <div class="container" style="background-color: white;">
            <div class="d-flex flex-wrap row-section-div">
                <div class="post-share-col-block">
                    <div class="d-grid social-share-post">
                        <div class="div-share-list">
                            <div class="post-share-btn-icon">
                                <i class="fab fa-facebook" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="div-share-list">
                            <div class="post-share-btn-icon">
                                <i class="fab fa-twitter" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="div-share-list">
                            <div class="post-share-btn-icon">
                                <i class="fab fa-linkedin" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="div-share-list">
                            <div class="post-share-btn-icon">
                                <i class="fab fa-whatsapp" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="div-share-list">
                            <div class="post-share-btn-icon">
                                <i class="fas fa-envelope" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="post-content-col-block">
                    <div class="details-post-contentdiv">
                        <div class="inner-details-post-contentdiv">
                            <h1 class="post-main-title">{{ $post->title }}</h1>
                            <div class="d-flex flex-wrap align-items-center post-icon-list-items">
                                <div class="post-inline-item">
                                    <span class="icon-list-icon">
                                        <i aria-hidden="true" class="fas fa-tags"></i>
                                    </span>
                                    <span class="post-info-item-type-terms">
                                        <a href="uncategorized.html">{{ $post->category->name ? $post->category->name : "Uncategorized" }}</a>
                                    </span>
                                </div>
                                <div class="post-inline-item">
                                    <span class="icon-list-icon">
                                        <i aria-hidden="true" class="fas fa-calendar"></i>
                                    </span>
                                    <span class="post-info-item-type-terms">
                                        <a href="date-result.html">{{ date("F j, Y", strtotime($post->created_at)) }}</a>
                                    </span>
                                </div>
                            </div>
                            <div class="block-divider">
                                <div class="divider-separator-post">
                                </div>
                            </div>
                            <div class="post-data-container">
                                {!! $post->body !!}
                            </div>
                        </div>
                        <div class="divider-block-new"></div>
                        <div class="divider-block-new"></div>
                    </div>
                </div>
                <div class="post-right-col-block">
                    <div class="inner-col-block">

                        <div class="sidebar-block-populated">
                            <div class="author-sidebar-block">
                                <div class="author-icon-img">
                                    <img src="{{ asset('assets/web/images/author.png') }}" alt>
                                </div>
                                <div class="author-name-block">
                                    <a class="author-name-link" href="another-one.html">By Another One</a>
                                </div>
                            </div>
                            <div class="search-form-sidebar">
                                <div class="d-flex search-form-block">
                                    <input placeholder="Search..." class="search-form-input" type="search"
                                        title="Search" value="">
                                    <button class="search-form-submit" type="submit" title="Search">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="recent-posts-sidebar">
                                <h3 class="title-recent"><span>Recent Posts</span></h3>
                                <div class="post-blog-items-cover">
                                    <div class="d-flex flex-wrap post-blog-item">
                                        <div class="flex-shrink-0 post__thumbnail">
                                            <a class="img-thumbnail-block" href="#">
                                                <img src="{{ asset('assets/web/images/untitledBWV-31-6.jpg') }}">
                                            </a>
                                        </div>
                                        <div class="flex-grow-2 blog_post_text">
                                            <h4 class="post_title">
                                                <a href="#">Hello world!</a>
                                            </h4>
                                            <div class="blog_post_meta_data">
                                                <span class="blog-post-date">October 25, 2019</span>
                                            </div>
                                            <a class="blog_post_read-btn"
                                                href="https://kiukitours.com/uncategorized/hello-world/">Read More »</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="advertisement-sidebar-inner">
                                <div class="advertisement-info-new">Advertisement</div>
                            </div>
                        </div>
                        <div class="newsletters-block">
                            <div class="newsletters-content">
                                <div class="icon-newsletters"><i class="fas fa-envelope-open-text"
                                        aria-hidden="true"></i></div>
                                <div class="title-stay-connected">Stay Connected!</div>
                                <p class="text-block-custom">Receive email updates with our latest news and promotions.
                                </p>
                                <div class="sign-up-pop-cover">
                                    <button type="button" class="sign-up-pop" data-toggle="modal"
                                        data-target="#newsletters_popup">Sign Up</button>
                                    <!-- Open Newletter Model -->
                                    <div class="modal fade newsletters_popup " id="newsletters_popup">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="newsletters-popup-content">
                                                    <button type="button" class="close modal_view_close"
                                                        data-dismiss="modal" aria-label="Close">
                                                        <img src="{{ asset('images/close-black.svg') }}" />
                                                    </button>
                                                    <div class="form-pop-icon"><i aria-hidden="true"
                                                            class="fas fa-envelope-open-text"></i></div>
                                                    <h5 class="form-pop-title">Newsletter Signup</h5>
                                                    <div class="form-pop-text">Receive email updates for our latest news
                                                        and promotions.</div>
                                                    <div class="form-popup-block">
                                                        <form>
                                                            <div class="form-popup-group">
                                                                <input type="text" class="input-popup-text"
                                                                    id="recipient-name" placeholder="First Name">
                                                                <div class="validation_message" style="display:none;">At
                                                                    least one field must be filled out</div>
                                                            </div>
                                                            <div class="form-popup-group">
                                                                <input type="email" class="input-popup-text"
                                                                    id="recipient-email" placeholder="Email">
                                                                <div class="validation_message" style="display:none;">At
                                                                    least one field must be filled out</div>
                                                            </div>
                                                            <div class="form-popup-group">
                                                                <input type="submit" id="form_submit_button"
                                                                    class="form_submit_button" value="Subscribe">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="categories-block border-none">
                            <h5 class="cat-heading-title">Categories</h5>
                            <ul>
                                <li><a href="uncategorized.html">Uncategorized</a> (1)</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End #Main Content-->
@endsection

@section('scripts')
<script>
    jQuery("body").attr('class', 'bg-fixed banner-news');
    console.log('here')
</script>
@endsection