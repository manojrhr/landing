@extends('layouts/web/web')

@section('styles')
<style type="text/css">
   .profile-header{
      height: 200px;
   }
   body
   {
      font-size: 1rem;
   }
   .Container--md {
   max-width: 960px;
}
</style>
@endsection

@section('content')
<div class="cms Container mt-5 mb-5">
   <div class="container u-bgWhite u-textCenter u-lg-pv4">
      <div class="Container Container--md u-lg-sizeFull u-pv1">
         <div class="u-textCenter u-pv2">
            <div class="u-mb1_5">
               <h2 class="u-display2 u-sm-display1 u-mb05">What We Do</h2>
               <div class="Divider Divider--blue"></div>
            </div>
            <p>Founded in 2012, we are happy to call South Florida our home and base of the #1 BOAT RENTAL COMMUNITY. <br>We bridge the boating world in a way it has never been connected before. Whether you're looking for a boat rental for a day or a week-long charter, we provide the largest marketplace for any boating experience, with over 17,000 boats in over 600 locations to choose from.</p>
         </div>

         <div class="container">
            <img class="u-sizeFull" src="//cdn-production.boatsetter.com/assets/boatsetter/about-us/map.svg" alt="">
         </div>

      </div>
   </div>


   <div class="Hero u-flex u-flexAlignItemsStart container">
      <div class="Hero-content u-pv4">
         <div class="Container Container--sm u-flex u-flexAlignItemsStart u-flexJustifyCenter">
            <div class="u-textCenter u-textWhite">
               <div class="u-mb1_5">
                  <h2 class="u-display2 u-sm-display1 u-mb05">Our Mission</h2>
               </div>
                <p>We are passionate about creating a world where anyone can set sail on a boating adventure. We hustle every day to make boating accessible for everyone.</p>
            </div>
         </div>
      </div>
   </div>


</div>
   <div class="Hero u-flex u-flexAlignItemsStart container">
      <div class="Hero-content u-pv4">
         <div class="Container Container--sm u-flex u-flexAlignItemsStart u-flexJustifyCenter">
            <div class="u-textCenter u-textWhite">
               <div class="u-mb1_5">
                  <h2 class="u-display2 u-sm-display1 u-mb05">Our Team</h2>
               </div>
               <p>We're a group of fun, hard-working, creative, and experienced professionals who also happen to be boaters; our
                  team hails from all over the world, just like our boats do. The love of boating is in the drinking water at Boatsetter
                  and we've made it our mission to get everyone onboard.
               </p>
            </div>
         </div>
      </div>
   </div>


</div>


@endsection