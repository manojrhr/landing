@extends('layouts.web.master')

@section('styles')
<style>
    body {
        background: url({{ asset('assets/web/images/WEST-END-NEGRIL-RICKS-CAFE-1.jpg') }}
    }
</style>
@endsection

@section('content')

<!-- #Main Content-->
<div id="main-content">
    <div class="section-news-one">
        <div class="container">
            <div class="cover-blog-page-title">
                <div class="d-flex align-items-center justify-content-center blog-page-title">
                    <h1 class="blog-main-title">NEWS & BLOGS</h1>
                </div>
            </div>
            @foreach ($blogs as $post)
                <div class="d-flex flex-wrap row-section-div">
                    <div class="left-col-block">
                        <div class="blog-post-cover">
                            <div class="blog-post-list">
                                <div class="blog-post-item">
                                    <div class="blog-post-img">
                                        <a href="{{ route('blog.single', $post->slug) }}" class="blog-post-background-cover" title="Hello world!" 
                                                style="background-image:url({{ asset($post->feature_image) }})"></a>
                                        <a class="post-category-button" href="uncategorized.html" rel="category tag">{{ $post->category->title }}</a>
                                    </div>
                                    <div class="blog-post-content">
                                        <div class="post-grid-desc">
                                            <h2 class="post-grid-title">
                                                <a href="{{ route('blog.single', $post->slug) }}" class="bdt-post-grid-link"
                                                    title="Hello world!">{{ $post->title }}</a>
                                            </h2>
                                            <div class="post-grid-excerpt">
                                                <p>{!! $post->body !!}</p>
                                            </div>
                                            <a href="{{ route('blog.single', $post->slug) }}" class="post-grid-readmore">
                                                Read More
                                                <i aria-hidden="true" class="fa-fw fas fa-caret-right"></i>
                                            </a>
                                        </div>
                                        <div
                                            class="d-flex flex-wrap align-items-center justify-content-center post-grid-meta">
                                            <span class="post-grid-date">{{ date("F j, Y", strtotime($post->created_at)) }}</span>
                                            <span class="post-grid-comments"><i class="far fa-comment"></i> 1</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="right-col-block">
                        <div class="inner-col-block">
                            <div class="categories-block">
                                <h5 class="cat-heading-title">Categories</h5>
                                <ul>
                                    <li><a href="uncategorized.html">Uncategorized</a> (1)</li>
                                </ul>
                            </div>
                            <div class="advertisement-block">
                                <div class="advertisement-content">
                                    <div class="advertisement-info">Advertisement</div>
                                </div>
                            </div>
                            <div class="newsletters-block">
                                <div class="newsletters-content">
                                    <div class="icon-newsletters"><i class="fas fa-envelope-open-text"
                                            aria-hidden="true"></i></div>
                                    <div class="title-stay-connected">Stay Connected!</div>
                                    <p class="text-block-custom">Receive email updates with our latest news and
                                        promotions.</p>
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
                                                            <img src="images/close-black.svg" />
                                                        </button>
                                                        <div class="form-pop-icon"><i aria-hidden="true"
                                                                class="fas fa-envelope-open-text"></i></div>
                                                        <h5 class="form-pop-title">Newsletter Signup</h5>
                                                        <div class="form-pop-text">Receive email updates for our
                                                            latest news and promotions.</div>
                                                        <div class="form-popup-block">
                                                            <form>
                                                                <div class="form-popup-group">
                                                                    <input type="text" class="input-popup-text"
                                                                        id="recipient-name" placeholder="First Name">
                                                                    <div class="validation_message" style="display:none;">At
                                                                        least one field
                                                                        must be filled out</div>
                                                                </div>
                                                                <div class="form-popup-group">
                                                                    <input type="email" class="input-popup-text"
                                                                        id="recipient-email" placeholder="Email">
                                                                    <div class="validation_message" style="display:none;">At
                                                                        least one field
                                                                        must be filled out</div>
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
                            <div class="blog-tags-block">
                                <div class="blog-tags-content">
                                    <h3 class="blog-tags-title">Popular Tags</h3>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- End #Main Content-->
@endsection

@section('scripts')
@endsection