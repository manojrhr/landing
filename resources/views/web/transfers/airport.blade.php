@extends('layouts.web.master')

@section('content')

<!-- #Main Content-->
<div id="main-content">
    <div class="container">
        <div class="airport-transfers-cover">
            <div class="d-flex flex-wrap row-airport-transfers">
                <div class="left-airport-transfers">
                    <div class="breadcrumb-block breadcrumb-airport-transfers">
                        <nav class="d-flex flex-wrap justify-content-center nav-breadcrumb">
                            <a href="index.html">Home</a>&nbsp;/&nbsp;<a href="tours.html">Tours</a>&nbsp;/&nbsp;YS and
                            Tastes of Jamaica</nav>
                    </div>
                    <div class="title-transfers-airport">
                        <h1 class="title-airport">Airport Transfers</h1>
                    </div>
                    <div class="busimg-block-title" style="display:none;">
                        <img src="images/bus-img.png" />
                    </div>
                    <div class="transfers-content-expert">
                        <p>Let’s arrange your MBJ airport transfer in advance to & from your hotel destination in
                            comfort. Our shuttle transfer service takes from Sangsters International Airport in Montego
                            Bay (MBJ) to your hotel, and back without any hassle for your departure.</p>
                    </div>
                    <hr class="divider-separator" />
                    <div id="transfers-book-instantly" class="transfers-book-instantly">
                        <a class="saltella booking-form-airport-button transfers-book-instantly-button" href="#">Book
                            Instantly!</a>
                    </div>
                    <div class="transfers-book-instantly-fixed" style="display:none;">
                        <a class="booking-form-airport-button transfers-instantly-button-fixed" href="#">Book
                            Transfer</a>
                    </div>
                    <div id="book-airport-transfers-form" class="book-airport-transfers-form">
                        <h3 class="airport-transfers-form-title">Book This Tour Below</h3>
                        <div class="form-airport-transfers-booking-block">
                            <form>
                            @csrf
                            <input type="hidden" name="pax_price" id="pax_price" value=""/>
                            <div class="wc-bookings-booking-form">
                                <div
                                    class="wc-bookings-date-picker wc-bookings-date-picker-booking wc_bookings_field_start_date">
                                    <div id="datepicker1"></div>
                                </div>
                                <div class="wc-bookings-booking-cost"><strong>This booking date is
                                        available!</strong></div>
                            </div>
                        </div>
                        <div class="form-row-block">
                            <div class="d-flex flex-wrap row-form-div">
                                <div class="one-half left-one-half">
                                    <span class="label-span">Transfer Type</span>
                                    <div class="select-form-input-div">
                                        <select class="form-control" name="type" id="type" onChange="calculate_price()">
                                            <option value="shared">Shared</option>
                                            <option value="private">Private</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="one-half right-one-half">
                                    <span class="label-span">One-way/Round Trip</span>
                                    <div class="select-form-input-div">
                                        <select class="form-control" name="trip_type" id="trip_type" onChange="calculate_price()">
                                            <option value="round-trip">Round Trip</option>
                                            <option value="one-way-to-mbj">One-Way to MBJ Airport</option>
                                            <option value="one-way-fr-mbj">One-Way from MBJ Airport</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row-block">
                            <span class="label-span">One-way/Round Trip</span>
                            <div class="select-form-input-div">
                                <select class="form-control" name="location" id="location" onChange="get_transfer_price()">
                                    {{-- <option value="">--select location--</option> --}}
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->id }}">{{ $location->name }}</option>                                                           
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-row-block">
                            <div class="d-flex flex-wrap row-form-div">
                                <div class="one-half left-one-half">
                                    <span class="label-span">Number of Adults (Ages 12+)</span>
                                    <input name="adults" id="adults" class="input-box" type="number" value="1" min="1" step="1" max="100"
                                        id="pickup_num_adults" onChange="calculate_price()" required="">
                                </div>
                                <div class="one-half right-one-half">
                                    <span class="label-span">Number of Children (Ages 3-11)</span>
                                    <input name="child" id="child" class="input-box" type="number" value="0" min="0" step="1" max="100"
                                        id="pickup_num_children" onChange="calculate_price()" required="">
                                </div>
                            </div>
                        </div>
                        <div class="form-row-block">
                            <span id="max_pax_text"><span style="color:red;">* </span>Max. number of Persons/PAX:
                                10</span>
                        </div>
                        {{-- <div id="accordion-form">
                            <div class="form-row-accordion">
                                <button class="toggle-form-accordion collapsed" type="button" data-toggle="collapse"
                                    data-target="#arrival_info_section" aria-expanded="false"
                                    aria-controls="arrival_info_section">Arrival Flight Information (MBJ)</button>
                                <div class="collapse" id="arrival_info_section" data-parent="#accordion-form">
                                    <div class="accordion-form-inner">
                                        <div class="arrival_airline_info">
                                            <span class="label-span">Arrival Airline/Flight Details</span>
                                            <div class="d-flex flex-wrap row_field_flt">
                                                <div class="arrival_airline left-field-flt select-airline-number-div">
                                                    <select class="select-airline-number form-control select2">
                                                        <option disabled="" selected="" value="" data-select2-id="8843">
                                                            Select Airline/Flight No.</option>
                                                        <option value="rnx" data-select2-id="8851">1Time Airline (RNX |
                                                            1T)</option>
                                                        <option value="mla" data-select2-id="8852">40-Mile Air (MLA |
                                                            Q5)</option>
                                                        <option value="aaa" data-select2-id="8853">Ansett Australia (AAA
                                                            | AN)</option>
                                                        <option value="1b" data-select2-id="8854">Abacus International
                                                            (1B)</option>
                                                        <option value="aaf" data-select2-id="8855">Aigle Azur (AAF | ZI)
                                                        </option>
                                                        <option value="aah" data-select2-id="8856">Aloha Airlines (AAH |
                                                            AQ)</option>
                                                        <option value="aal" data-select2-id="8857">American Airlines
                                                            (AAL | AA)</option>
                                                        <option value="aar" data-select2-id="8858">Asiana Airlines (AAR
                                                            | OZ)</option>
                                                        <option value="aas" data-select2-id="8859">Askari Aviation (AAS
                                                            | 4K)</option>
                                                        <option value="aaw" data-select2-id="8860">Afriqiyah Airways
                                                            (AAW | 8U)</option>
                                                        <option value="aay" data-select2-id="8861">Allegiant Air (AAY |
                                                            G4)</option>
                                                        <option value="tus" data-select2-id="8862">ABSA - Aerolinhas
                                                            Brasileiras (TUS | M3)</option>
                                                        <option value="acp" data-select2-id="8863">Astral Aviation (ACP
                                                            | 8V)</option>
                                                        <option value="8t" data-select2-id="8864">Air Tindi (8T)
                                                        </option>
                                                        <option value="ade" data-select2-id="8865">Ada Air (ADE | ZY)
                                                        </option>
                                                        <option value="adr" data-select2-id="8866">Adria Airways (ADR |
                                                            JP)</option>
                                                        <option value="aea" data-select2-id="8867">Air Europa (AEA | UX)
                                                        </option>
                                                        <option value="aeb" data-select2-id="8868">Aero Benin (AEB | EM)
                                                        </option>
                                                        <option value="aee" data-select2-id="8869">Aegean Airlines (AEE
                                                            | A3)</option>
                                                        <option value="ael" data-select2-id="8870">Air Europe (AEL | PE)
                                                        </option>
                                                        <option value="aer" data-select2-id="8871">Alaska Central
                                                            Express (AER | KO)</option>
                                                        <option value="aes" data-select2-id="8872">ACES Colombia (AES)
                                                        </option>
                                                        <option value="aeu" data-select2-id="8873">Astraeus (AEU | 5W)
                                                        </option>
                                                        <option value="aew" data-select2-id="8874">Aerosvit Airlines
                                                            (AEW | VV)</option>
                                                        <option value="aey" data-select2-id="8875">Air Italy (AEY | I9)
                                                        </option>
                                                        <option value="uty" data-select2-id="8876">Alliance Airlines
                                                            (UTY | QQ)</option>
                                                        <option value="afg" data-select2-id="8877">Ariana Afghan
                                                            Airlines (AFG | FG)</option>
                                                        <option value="afl" data-select2-id="8878">Aeroflot Russian
                                                            Airlines (AFL | SU)</option>
                                                        <option value="bon" data-select2-id="8879">Air Bosna (BON | JA)
                                                        </option>
                                                        <option value="afr" data-select2-id="8880">Air France (AFR | AF)
                                                        </option>
                                                        <option value="aci" data-select2-id="8881">Air Caledonie
                                                            International (ACI | SB)</option>
                                                        <option value="2o" data-select2-id="8882">Air Salone (2O)
                                                        </option>
                                                        <option value="snc" data-select2-id="8883">Air Cargo Carriers
                                                            (SNC | 2Q)</option>
                                                        <option value="nmb" data-select2-id="8884">Air Namibia (NMB |
                                                            SW)</option>
                                                        <option value="sli" data-select2-id="8885">Aerolitoral (SLI |
                                                            5D)</option>
                                                        <option value="agv" data-select2-id="8886">Air Glaciers (AGV |
                                                            7T)</option>
                                                        <option value="agx" data-select2-id="8887">Aviogenex (AGX)
                                                        </option>
                                                        <option value="pli" data-select2-id="8888">Aeroper (PLI | PL)
                                                        </option>
                                                        <option value="bmm" data-select2-id="8889">Atlas Blue (BMM | 8A)
                                                        </option>
                                                        <option value="ahy" data-select2-id="8890">Azerbaijan Airlines
                                                            (AHY | J2)</option>
                                                        <option value="aia" data-select2-id="8891">Avies (AIA | U3)
                                                        </option>
                                                        <option value="abq" data-select2-id="8892">Airblue (ABQ | ED)
                                                        </option>
                                                        <option value="air" data-select2-id="8893">Airlift International
                                                            (AIR)</option>
                                                        <option value="ber" data-select2-id="8894">Air Berlin (BER | AB)
                                                        </option>
                                                        <option value="aic" data-select2-id="8895">Air India Limited
                                                            (AIC | AI)</option>
                                                        <option value="bub" data-select2-id="8896">Air Bourbon (BUB |
                                                            ZB)</option>
                                                        <option value="abd" data-select2-id="8897">Air Atlanta Icelandic
                                                            (ABD | CC)</option>
                                                        <option value="tht" data-select2-id="8898">Air Tahiti Nui (THT |
                                                            TN)</option>
                                                        <option value="aiz" data-select2-id="8899">Arkia Israel Airlines
                                                            (AIZ | IZ)</option>
                                                        <option value="ajm" data-select2-id="8900">Air Jamaica (AJM |
                                                            JM)</option>
                                                        <option value="adh" data-select2-id="8901">Air One (ADH | AP)
                                                        </option>
                                                        <option value="rsh" data-select2-id="8902">Air Sahara (RSH | S2)
                                                        </option>
                                                        <option value="amc" data-select2-id="8903">Air Malta (AMC | KM)
                                                        </option>
                                                        <option value="ajx" data-select2-id="8904">Air Japan (AJX | NQ)
                                                        </option>
                                                        <option value="aka" data-select2-id="8905">Air Korea Co. Ltd.
                                                            (AKA)</option>
                                                        <option value="akl" data-select2-id="8906">Air Kiribati (AKL |
                                                            4A)</option>
                                                        <option value="awe" data-select2-id="8907">America West Airlines
                                                            (AWE | HP)</option>
                                                        <option value="awi" data-select2-id="8908">Air Wisconsin (AWI |
                                                            ZW)</option>
                                                        <option value="tak" data-select2-id="8909">Tatarstan Airlines
                                                            (TAK | U9)</option>
                                                        <option value="alo" data-select2-id="8910">Allegheny Commuter
                                                            Airlines (ALO)</option>
                                                        <option value="rsi" data-select2-id="8911">Air Sunshine (RSI)
                                                        </option>
                                                        <option value="vd" data-select2-id="8912">Air Libert (VD)
                                                        </option>
                                                        <option value="aml" data-select2-id="8913">Air Malawi (AML | QM)
                                                        </option>
                                                        <option value="bm" data-select2-id="8914">Air Sicilia (BM)
                                                        </option>
                                                        <option value="amt" data-select2-id="8915">ATA Airlines (AMT)
                                                        </option>
                                                        <option value="amu" data-select2-id="8916">Air Macau (AMU | NX)
                                                        </option>
                                                        <option value="amv" data-select2-id="8917">AMC Airlines (AMV)
                                                        </option>
                                                        <option value="sey" data-select2-id="8918">Air Seychelles (SEY |
                                                            HM)</option>
                                                        <option value="amx" data-select2-id="8919">AeroMéxico (AMX | AM)
                                                        </option>
                                                        <option value="ana" data-select2-id="8920">All Nippon Airways
                                                            (ANA | NH)</option>
                                                        <option value="ane" data-select2-id="8921">Air Nostrum (ANE |
                                                            YW)</option>
                                                        <option value="ang" data-select2-id="8922">Air Niugini (ANG |
                                                            PX)</option>
                                                        <option value="aby" data-select2-id="8923">Air Arabia (ABY | G9)
                                                        </option>
                                                        <option value="aca" data-select2-id="8924">Air Canada (ACA | AC)
                                                        </option>
                                                        <option value="bti" data-select2-id="8925">Air Baltic (BTI | BT)
                                                        </option>
                                                        <option value="ank" data-select2-id="8926">Air Nippon (ANK | EL)
                                                        </option>
                                                        <option value="ano" data-select2-id="8927">Airnorth (ANO | TL)
                                                        </option>
                                                        <option value="ant" data-select2-id="8928">Air North Charter -
                                                            Canada (ANT | 4N)</option>
                                                        <option value="anz" data-select2-id="8929">Air New Zealand (ANZ
                                                            | NZ)</option>
                                                        <option value="smx" data-select2-id="8930">Alitalia Express (SMX
                                                            | XM)</option>
                                                        <option value="arf" data-select2-id="8931">Aero Flight (ARF |
                                                            GV)</option>
                                                        <option value="apw" data-select2-id="8932">Arrow Air (APW | JW)
                                                        </option>
                                                        <option value="ard" data-select2-id="8933">Aerocondor (ARD | 2B)
                                                        </option>
                                                        <option value="are" data-select2-id="8934">Aires (ARE | 4C)
                                                        </option>
                                                        <option value="arg" data-select2-id="8935">Aerolineas Argentinas
                                                            (ARG | AR)</option>
                                                        <option value="asa" data-select2-id="8936">Alaska Airlines (ASA
                                                            | AS)</option>
                                                        <option value="asd" data-select2-id="8937">Air Sinai (ASD | 4D)
                                                        </option>
                                                        <option value="asq" data-select2-id="8938">Atlantic Southeast
                                                            Airlines (ASQ | EV)</option>
                                                        <option value="asz" data-select2-id="8939">Astrakhan Airlines
                                                            (ASZ | OB)</option>
                                                        <option value="atc" data-select2-id="8940">Air Tanzania (ATC |
                                                            TC)</option>
                                                        <option value="vbw" data-select2-id="8941">Air Burkina (VBW |
                                                            2J)</option>
                                                        <option value="atm" data-select2-id="8942">Airlines Of Tasmania
                                                            (ATM | FO)</option>
                                                        <option value="spm" data-select2-id="8943">Air Saint Pierre (SPM
                                                            | PJ)</option>
                                                        <option value="aua" data-select2-id="8944">Austrian Airlines
                                                            (AUA | OS)</option>
                                                        <option value="wow" data-select2-id="8945">Air Southwest (WOW)
                                                        </option>
                                                        <option value="aub" data-select2-id="8946">Augsburg Airways (AUB
                                                            | IQ)</option>
                                                        <option value="tur" data-select2-id="8947">ATUR (TUR)</option>
                                                        <option value="auh" data-select2-id="8948">Abu Dhabi Amiri
                                                            Flight (AUH | MO)</option>
                                                        <option value="aul" data-select2-id="8949">Aeroflot-Nord (AUL |
                                                            5N)</option>
                                                        <option value="aur" data-select2-id="8950">Aurigny Air Services
                                                            (AUR | GR)</option>
                                                        <option value="aut" data-select2-id="8951">Austral Lineas Aereas
                                                            (AUT | AU)</option>
                                                        <option value="ava" data-select2-id="8952">Avianca - Aerovias
                                                            Nacionales De Colombia (AVA | AV)</option>
                                                        <option value="avn" data-select2-id="8953">Air Vanuatu (AVN |
                                                            NF)</option>
                                                        <option value="bgd" data-select2-id="8954">Air Bangladesh (BGD |
                                                            B9)</option>
                                                        <option value="bie" data-select2-id="8955">Air Mediterranee (BIE
                                                            | DR)</option>
                                                        <option value="tah" data-select2-id="8956">Air Moorea (TAH)
                                                        </option>
                                                        <option value="awu" data-select2-id="8957">Aeroline GmbH (AWU |
                                                            7E)</option>
                                                        <option value="aww" data-select2-id="8958">Air Wales (AWW | 6G)
                                                        </option>
                                                        <option value="fwi" data-select2-id="8959">Air Caraïbes (FWI |
                                                            TX)</option>
                                                        <option value="axb" data-select2-id="8960">Air India Express
                                                            (AXB | IX)</option>
                                                        <option value="axl" data-select2-id="8961">Air Exel (AXL | XT)
                                                        </option>
                                                        <option value="axm" data-select2-id="8962">AirAsia (AXM | AK)
                                                        </option>
                                                        <option value="ayz" data-select2-id="8963">Atlant-Soyuz Airlines
                                                            (AYZ | 3G)</option>
                                                        <option value="aza" data-select2-id="8964">Alitalia (AZA | AZ)
                                                        </option>
                                                        <option value="azn" data-select2-id="8965">Amaszonas (AZN | Z8)
                                                        </option>
                                                        <option value="azw" data-select2-id="8966">Air Zimbabwe (AZW |
                                                            UM)</option>
                                                        <option value="oca" data-select2-id="8967">Aserca Airlines (OCA
                                                            | R7)</option>
                                                        <option value="sdm" data-select2-id="8968">Rossiya-Russian
                                                            Airlines (SDM | FV)</option>
                                                        <option value="egf" data-select2-id="8969">American Eagle
                                                            Airlines (EGF | MQ)</option>
                                                        <option value="vue" data-select2-id="8970">AD Aviation (VUE)
                                                        </option>
                                                        <option value="vun" data-select2-id="8971">Air Ivoire (VUN | VU)
                                                        </option>
                                                        <option value="bot" data-select2-id="8972">Air Botswana (BOT |
                                                            BP)</option>
                                                        <option value="upa" data-select2-id="8973">Air Foyle (UPA | GS)
                                                        </option>
                                                        <option value="vta" data-select2-id="8974">Air Tahiti (VTA | VT)
                                                        </option>
                                                        <option value="vim" data-select2-id="8975">Air VIA (VIM | VL)
                                                        </option>
                                                        <option value="wta" data-select2-id="8976">Africa West (WTA |
                                                            FK)</option>
                                                        <option value="vas" data-select2-id="8977">ATRAN Cargo Airlines
                                                            (VAS | V8)</option>
                                                        <option value="cca" data-select2-id="8978">Air China (CCA | CA)
                                                        </option>
                                                        <option value="cdp" data-select2-id="8979">Aero Condor Peru (CDP
                                                            | Q6)</option>
                                                        <option value="cva" data-select2-id="8980">Air Chathams (CVA |
                                                            CV)</option>
                                                        <option value="cwm" data-select2-id="8981">Air Marshall Islands
                                                            (CWM | CW)</option>
                                                        <option value="cyd" data-select2-id="8982">Access Air (CYD | ZA)
                                                        </option>
                                                        <option value="dah" data-select2-id="8983">Air Algerie (DAH |
                                                            AH)</option>
                                                        <option value="dhi" data-select2-id="8984">Adam Air (DHI | KI)
                                                        </option>
                                                        <option value="dla" data-select2-id="8985">Air Dolomiti (DLA |
                                                            EN)</option>
                                                        <option value="dnv" data-select2-id="8986">Aeroflot-Don (DNV |
                                                            D9)</option>
                                                        <option value="drd" data-select2-id="8987">Air Madrid (DRD | NM)
                                                        </option>
                                                        <option value="ein" data-select2-id="8988">Aer Lingus (EIN | EI)
                                                        </option>
                                                        <option value="fif" data-select2-id="8989">Air Finland (FIF |
                                                            OF)</option>
                                                        <option value="fix" data-select2-id="8990">Airfix Aviation (FIX)
                                                        </option>
                                                        <option value="fji" data-select2-id="8991">Air Pacific (FJI |
                                                            FJ)</option>
                                                        <option value="fli" data-select2-id="8992">Atlantic Airways (FLI
                                                            | RC)</option>
                                                        <option value="flz" data-select2-id="8993">Air Florida (FLZ |
                                                            QH)</option>
                                                        <option value="fxi" data-select2-id="8994">Air Iceland (FXI |
                                                            NY)</option>
                                                        <option value="gap" data-select2-id="8995">Air Philippines (GAP
                                                            | 2P)</option>
                                                        <option value="gip" data-select2-id="8996">Air Guinee Express
                                                            (GIP | 2U)</option>
                                                        <option value="grl" data-select2-id="8997">Air Greenland (GRL |
                                                            GL)</option>
                                                        <option value="gti" data-select2-id="8998">Atlas Air (GTI | 5Y)
                                                        </option>
                                                        <option value="guy" data-select2-id="8999">Air Guyane (GUY | GG)
                                                        </option>
                                                        <option value="jab" data-select2-id="9000">Air Bagan (JAB | W9)
                                                        </option>
                                                        <option value="jza" data-select2-id="9001">Air Canada Jazz (JZA
                                                            | QK)</option>
                                                        <option value="kkk" data-select2-id="9002">Atlasjet (KKK | KK)
                                                        </option>
                                                        <option value="kor" data-select2-id="9003">Air Koryo (KOR | JS)
                                                        </option>
                                                        <option value="kzr" data-select2-id="9004">Air Astana (KZR | KC)
                                                        </option>
                                                        <option value="lbc" data-select2-id="9005">Albanian Airlines
                                                            (LBC | LV)</option>
                                                        <option value="lfa" data-select2-id="9006">Air Alfa (LFA)
                                                        </option>
                                                        <option value="lne" data-select2-id="9007">Aerolane (LNE | XL)
                                                        </option>
                                                        <option value="lur" data-select2-id="9008">Atlantis European
                                                            Airways (LUR | TD)</option>
                                                        <option value="lxr" data-select2-id="9009">Air Luxor (LXR | LK)
                                                        </option>
                                                        <option value="mau" data-select2-id="9010">Air Mauritius (MAU |
                                                            MK)</option>
                                                        <option value="mdg" data-select2-id="9011">Air Madagascar (MDG |
                                                            MD)</option>
                                                        <option value="mld" data-select2-id="9012">Air Moldova (MLD |
                                                            9U)</option>
                                                        <option value="mpd" data-select2-id="9013">Air Plus Comet (MPD |
                                                            A7)</option>
                                                        <option value="8d" data-select2-id="9014">Astair (8D)</option>
                                                        <option value="nig" data-select2-id="9015">Aero Contractors (NIG
                                                            | AJ)</option>
                                                        <option value="pel" data-select2-id="9016">Aeropelican Air
                                                            Services (PEL | OT)</option>
                                                        <option value="rea" data-select2-id="9017">Aer Arann (REA | RE)
                                                        </option>
                                                        <option value="reu" data-select2-id="9018">Air Austral (REU |
                                                            UU)</option>
                                                        <option value="rit" data-select2-id="9019">Asian Spirit (RIT |
                                                            6K)</option>
                                                        <option value="rka" data-select2-id="9020">Air Afrique (RKA |
                                                            RK)</option>
                                                        <option value="rla" data-select2-id="9021">Airlinair (RLA | A5)
                                                        </option>
                                                        <option value="rln" data-select2-id="9022">Aero Lanka (RLN | QL)
                                                        </option>
                                                        <option value="rne" data-select2-id="9023">Air Salone (RNE | 20)
                                                        </option>
                                                        <option value="rnv" data-select2-id="9024">Armavia (RNV | U8)
                                                        </option>
                                                        <option value="rpb" data-select2-id="9025">AeroRep (RPB | P5)
                                                        </option>
                                                        <option value="rsr" data-select2-id="9026">Aero-Service (RSR |
                                                            BF)</option>
                                                        <option value="rsu" data-select2-id="9027">Aerosur (RSU | 5L)
                                                        </option>
                                                        <option value="rte" data-select2-id="9028">Aeronorte (RTE)
                                                        </option>
                                                        <option value="smj" data-select2-id="9029">Avient Aviation (SMJ
                                                            | Z3)</option>
                                                        <option value="syl" data-select2-id="9030">Aircompany Yakutia
                                                            (SYL | R3)</option>
                                                        <option value="tao" data-select2-id="9031">Aeromar (TAO | VW)
                                                        </option>
                                                        <option value="tfl" data-select2-id="9032">Arkefly (TFL | OR)
                                                        </option>
                                                        <option value="tok" data-select2-id="9033">Airlines PNG (TOK |
                                                            CG)</option>
                                                        <option value="trs" data-select2-id="9034">AirTran Airways (TRS
                                                            | FL)</option>
                                                        <option value="tsc" data-select2-id="9035">Air Transat (TSC |
                                                            TS)</option>
                                                        <option value="twn" data-select2-id="9036">Avialeasing Aviation
                                                            Company (TWN | EC)</option>
                                                        <option value="tyr" data-select2-id="9037">Tyrolean Airways (TYR
                                                            | VO)</option>
                                                        <option value="glg" data-select2-id="9038">Aerolineas Galapagos
                                                            (Aerogal) (GLG | 2K)</option>
                                                        <option value="dru" data-select2-id="9039">Alrosa Mirny Air
                                                            Enterprise (DRU | 6R)</option>
                                                        <option value="baw" data-select2-id="9040">British Airways (BAW
                                                            | BA)</option>
                                                        <option value="bbc" data-select2-id="9041">Biman Bangladesh
                                                            Airlines (BBC | BG)</option>
                                                        <option value="bhp" data-select2-id="9042">Belair Airlines (BHP
                                                            | 4T)</option>
                                                        <option value="bhs" data-select2-id="9043">Bahamasair (BHS | UP)
                                                        </option>
                                                        <option value="lz" data-select2-id="9044">Balkan Bulgarian
                                                            Airlines (LZ)</option>
                                                        <option value="bih" data-select2-id="9045">British International
                                                            Helicopters (BIH | BS)</option>
                                                        <option value="bkf" data-select2-id="9046">BF-Lento OY (BKF)
                                                        </option>
                                                        <option value="bkp" data-select2-id="9047">Bangkok Airways (BKP
                                                            | PG)</option>
                                                        <option value="blf" data-select2-id="9048">Blue1 (BLF | KF)
                                                        </option>
                                                        <option value="bll" data-select2-id="9049">Baltic Airlines (BLL)
                                                        </option>
                                                        <option value="bls" data-select2-id="9050">Bearskin Lake Air
                                                            Service (BLS | JV)</option>
                                                        <option value="blv" data-select2-id="9051">Bellview Airlines
                                                            (BLV | B3)</option>
                                                        <option value="bma" data-select2-id="9052">Bmi (BMA | BD)
                                                        </option>
                                                        <option value="bmi" data-select2-id="9053">Bmibaby (BMI | WW)
                                                        </option>
                                                        <option value="bmj" data-select2-id="9054">Bemidji Airlines (BMJ
                                                            | CH)</option>
                                                        <option value="bmr" data-select2-id="9055">British Midland
                                                            Regional (BMR)</option>
                                                        <option value="bpa" data-select2-id="9056">Blue Panorama
                                                            Airlines (BPA | BV)</option>
                                                        <option value="bps" data-select2-id="9057">Budapest Aircraft
                                                            Services/Manx2 (BPS)</option>
                                                        <option value="brg" data-select2-id="9058">Bering Air (BRG | 8E)
                                                        </option>
                                                        <option value="brs" data-select2-id="9059">Brazilian Air Force
                                                            (BRS)</option>
                                                        <option value="bru" data-select2-id="9060">Belavia Belarusian
                                                            Airlines (BRU | B2)</option>
                                                        <option value="btv" data-select2-id="9061">Metro Batavia (BTV |
                                                            7P)</option>
                                                        <option value="bvt" data-select2-id="9062">Berjaya Air (BVT |
                                                            J8)</option>
                                                        <option value="bwg" data-select2-id="9063">Blue Wings (BWG | QW)
                                                        </option>
                                                        <option value="bzh" data-select2-id="9064">Brit Air (BZH | DB)
                                                        </option>
                                                        <option value="dat" data-select2-id="9065">Brussels Airlines
                                                            (DAT | SN)</option>
                                                        <option value="ibb" data-select2-id="9066">Binter Canarias (IBB
                                                            | NT)</option>
                                                        <option value="jor" data-select2-id="9067">Blue Air (JOR | 0B)
                                                        </option>
                                                        <option value="laj" data-select2-id="9068">British Mediterranean
                                                            Airways (LAJ | KJ)</option>
                                                        <option value="lzb" data-select2-id="9069">Bulgaria Air (LZB |
                                                            FB)</option>
                                                        <option value="nkf" data-select2-id="9070">Barents AirLink (NKF
                                                            | 8N)</option>
                                                        <option value="icl" data-select2-id="9071">CAL Cargo Air Lines
                                                            (ICL | 5C)</option>
                                                        <option value="cli" data-select2-id="9072">Calima Aviacion (CLI
                                                            | XG)</option>
                                                        <option value="cdn" data-select2-id="9073">Canadian Airlines
                                                            (CDN | CP)</option>
                                                        <option value="mpe" data-select2-id="9074">Canadian North (MPE |
                                                            5T)</option>
                                                        <option value="kap" data-select2-id="9075">Cape Air (KAP | 9K)
                                                        </option>
                                                        <option value="bwa" data-select2-id="9076">Caribbean Airlines
                                                            (BWA | BW)</option>
                                                        <option value="krp" data-select2-id="9077">Carpatair (KRP | V3)
                                                        </option>
                                                        <option value="cpn" data-select2-id="9078">Caspian Airlines (CPN
                                                            | RV)</option>
                                                        <option value="cpa" data-select2-id="9079">Cathay Pacific (CPA |
                                                            CX)</option>
                                                        <option value="cay" data-select2-id="9080">Cayman Airways (CAY |
                                                            KX)</option>
                                                        <option value="ceb" data-select2-id="9081">Cebu Pacific (CEB |
                                                            5J)</option>
                                                        <option value="ccg" data-select2-id="9082">Central Connect
                                                            Airlines (CCG)</option>
                                                        <option value="clw" data-select2-id="9083">Centralwings (CLW |
                                                            C0)</option>
                                                        <option value="chw" data-select2-id="9084">Charter Air (CHW)
                                                        </option>
                                                        <option value="chq" data-select2-id="9085">Chautauqua Airlines
                                                            (CHQ | RP)</option>
                                                        <option value="cal" data-select2-id="9086">China Airlines (CAL |
                                                            CI)</option>
                                                        <option value="ces" data-select2-id="9087">China Eastern
                                                            Airlines (CES | MU)</option>
                                                        <option value="csn" data-select2-id="9088">China Southern
                                                            Airlines (CSN | CZ)</option>
                                                        <option value="cua" data-select2-id="9089">China United Airlines
                                                            (CUA | HR)</option>
                                                        <option value="cyh" data-select2-id="9090">Yunnan Airlines (CYH
                                                            | 3Q)</option>
                                                        <option value="cim" data-select2-id="9091">Cimber Air (CIM | QI)
                                                        </option>
                                                        <option value="rus" data-select2-id="9092">Cirrus Airlines (RUS
                                                            | C9)</option>
                                                        <option value="sdr" data-select2-id="9093">City Airline (SDR |
                                                            CF)</option>
                                                        <option value="cix" data-select2-id="9094">City Connexion
                                                            Airlines (CIX | G3)</option>
                                                        <option value="bcy" data-select2-id="9095">CityJet (BCY | WX)
                                                        </option>
                                                        <option value="cfe" data-select2-id="9096">BA CityFlyer (CFE |
                                                            CJ)</option>
                                                        <option value="cgk" data-select2-id="9097">Click Airways (CGK)
                                                        </option>
                                                        <option value="dq" data-select2-id="9098">Coastal Air (DQ)
                                                        </option>
                                                        <option value="cjc" data-select2-id="9099">Colgan Air (CJC | 9L)
                                                        </option>
                                                        <option value="com" data-select2-id="9100">Comair (COM | OH)
                                                        </option>
                                                        <option value="caw" data-select2-id="9101">Comair (CAW | MN)
                                                        </option>
                                                        <option value="uca" data-select2-id="9102">CommutAir (UCA | C5)
                                                        </option>
                                                        <option value="cwk" data-select2-id="9103">Comores Airlines (CWK
                                                            | KR)</option>
                                                        <option value="cpz" data-select2-id="9104">Compass Airlines (CPZ
                                                            | CP)</option>
                                                        <option value="cfg" data-select2-id="9105">Condor Flugdienst
                                                            (CFG | DE)</option>
                                                        <option value="chp" data-select2-id="9106">Consorcio Aviaxsa
                                                            (CHP | 6A)</option>
                                                        <option value="kis" data-select2-id="9107">Contact Air (KIS |
                                                            C3)</option>
                                                        <option value="coa" data-select2-id="9108">Continental Airlines
                                                            (COA | CO)</option>
                                                        <option value="co" data-select2-id="9109">Continental Express
                                                            (CO)</option>
                                                        <option value="cmi" data-select2-id="9110">Continental
                                                            Micronesia (CMI | CS)</option>
                                                        <option value="vcv" data-select2-id="9111">Conviasa (VCV | V0)
                                                        </option>
                                                        <option value="cmp" data-select2-id="9112">Copa Airlines (CMP |
                                                            CM)</option>
                                                        <option value="aaq" data-select2-id="9113">Copterline (AAQ)
                                                        </option>
                                                        <option value="cai" data-select2-id="9114">Corendon Airlines
                                                            (CAI)</option>
                                                        <option value="crl" data-select2-id="9115">Corsairfly (CRL | SS)
                                                        </option>
                                                        <option value="ccm" data-select2-id="9116">Corse-Mediterranee
                                                            (CCM | XK)</option>
                                                        <option value="can" data-select2-id="9117">Crest Aviation (CAN)
                                                        </option>
                                                        <option value="ctn" data-select2-id="9118">Croatia Airlines (CTN
                                                            | OU)</option>
                                                        <option value="cro" data-select2-id="9119">Crown Airways (CRO)
                                                        </option>
                                                        <option value="cub" data-select2-id="9120">Cubana De Aviación
                                                            (CUB | CU)</option>
                                                        <option value="cyp" data-select2-id="9121">Cyprus Airways (CYP |
                                                            CY)</option>
                                                        <option value="yk" data-select2-id="9122">Cyprus Turkish
                                                            Airlines (YK)</option>
                                                        <option value="csa" data-select2-id="9123">Czech Airlines (CSA |
                                                            OK)</option>
                                                        <option value="dtr" data-select2-id="9124">DAT Danish Air
                                                            Transport (DTR | DX)</option>
                                                        <option value="dao" data-select2-id="9125">Daallo Airlines (DAO
                                                            | D3)</option>
                                                        <option value="khb" data-select2-id="9126">Dalavia (KHB | H8)
                                                        </option>
                                                        <option value="dwt" data-select2-id="9127">Darwin Airline (DWT |
                                                            0D)</option>
                                                        <option value="dea" data-select2-id="9128">Delta Aerotaxi (DEA)
                                                        </option>
                                                        <option value="dal" data-select2-id="9129">Delta Airlines (DAL |
                                                            DL)</option>
                                                        <option value="dnm" data-select2-id="9130">Denim Air (DNM)
                                                        </option>
                                                        <option value="2a" data-select2-id="9131">Deutsche Bahn (2A)
                                                        </option>
                                                        <option value="djb" data-select2-id="9132">Djibouti Airlines
                                                            (DJB | D8)</option>
                                                        <option value="udn" data-select2-id="9133">Dniproavia (UDN)
                                                        </option>
                                                        <option value="doa" data-select2-id="9134">Dominicana De Aviaci
                                                            (DOA | DO)</option>
                                                        <option value="dmo" data-select2-id="9135">Domodedovo Airlines
                                                            (DMO | E3)</option>
                                                        <option value="udc" data-select2-id="9136">DonbassAero (UDC |
                                                            5D)</option>
                                                        <option value="hda" data-select2-id="9137">Dragonair (HDA | KA)
                                                        </option>
                                                        <option value="drk" data-select2-id="9138">Druk Air (DRK | KB)
                                                        </option>
                                                        <option value="dbk" data-select2-id="9139">Dubrovnik Air (DBK)
                                                        </option>
                                                        <option value="dnl" data-select2-id="9140">Dutch Antilles
                                                            Express (DNL)</option>
                                                        <option value="bag" data-select2-id="9141">Dba (BAG | DI)
                                                        </option>
                                                        <option value="eva" data-select2-id="9142">EVA Air (EVA | BR)
                                                        </option>
                                                        <option value="h7" data-select2-id="9143">Eagle Air (H7)
                                                        </option>
                                                        <option value="ugx" data-select2-id="9144">East African (UGX |
                                                            QU)</option>
                                                        <option value="eze" data-select2-id="9145">Eastern Airways (EZE
                                                            | T3)</option>
                                                        <option value="ela" data-select2-id="9146">Eastland Air (ELA |
                                                            DK)</option>
                                                        <option value="ecu" data-select2-id="9147">Ecuavia (ECU)
                                                        </option>
                                                        <option value="edw" data-select2-id="9148">Edelweiss Air (EDW |
                                                            WK)</option>
                                                        <option value="msr" data-select2-id="9149">Egyptair (MSR | MS)
                                                        </option>
                                                        <option value="ely" data-select2-id="9150">El Al Israel Airlines
                                                            (ELY | LY)</option>
                                                        <option value="brq" data-select2-id="9151">El-Buraq Air
                                                            Transport (BRQ | UZ)</option>
                                                        <option value="uae" data-select2-id="9152">Emirates (UAE | EK)
                                                        </option>
                                                        <option value="eea" data-select2-id="9153">Empresa Ecuatoriana
                                                            De Aviacion (EEA | EU)</option>
                                                        <option value="ert" data-select2-id="9154">Eritrean Airlines
                                                            (ERT | B8)</option>
                                                        <option value="ell" data-select2-id="9155">Estonian Air (ELL |
                                                            OV)</option>
                                                        <option value="eth" data-select2-id="9156">Ethiopian Airlines
                                                            (ETH | ET)</option>
                                                        <option value="etd" data-select2-id="9157">Etihad Airways (ETD |
                                                            EY)</option>
                                                        <option value="rz" data-select2-id="9158">Euro Exec Express (RZ)
                                                        </option>
                                                        <option value="eca" data-select2-id="9159">Eurocypria Airlines
                                                            (ECA | UI)</option>
                                                        <option value="eeu" data-select2-id="9160">Eurofly Service (EEU
                                                            | GJ)</option>
                                                        <option value="elo" data-select2-id="9161">Eurolot (ELO | K2)
                                                        </option>
                                                        <option value="eal" data-select2-id="9162">European Air Express
                                                            (EAL | EA)</option>
                                                        <option value="ewg" data-select2-id="9163">Eurowings (EWG | EW)
                                                        </option>
                                                        <option value="eia" data-select2-id="9164">Evergreen
                                                            International Airlines (EIA | EZ)</option>
                                                        <option value="xla" data-select2-id="9165">Excel Airways (XLA |
                                                            JN)</option>
                                                        <option value="xel" data-select2-id="9166">Excel Charter (XEL)
                                                        </option>
                                                        <option value="lhn" data-select2-id="9167">Express One
                                                            International (LHN | EO)</option>
                                                        <option value="bta" data-select2-id="9168">ExpressJet (BTA | XE)
                                                        </option>
                                                        <option value="ezy" data-select2-id="9169">EasyJet (EZY | U2)
                                                        </option>
                                                        <option value="efa" data-select2-id="9170">Far Eastern Air
                                                            Transport (EFA | EF)</option>
                                                        <option value="fin" data-select2-id="9171">Finnair (FIN | AY)
                                                        </option>
                                                        <option value="wba" data-select2-id="9172">Finncomm Airlines
                                                            (WBA | FC)</option>
                                                        <option value="ffm" data-select2-id="9173">Firefly (FFM | FY)
                                                        </option>
                                                        <option value="fab" data-select2-id="9174">First Air (FAB | 7F)
                                                        </option>
                                                        <option value="fca" data-select2-id="9175">First Choice Airways
                                                            (FCA | DP)</option>
                                                        <option value="flt" data-select2-id="9176">Flightline (FLT | B5)
                                                        </option>
                                                        <option value="fwl" data-select2-id="9177">Florida West
                                                            International Airways (FWL | RF)</option>
                                                        <option value="xax" data-select2-id="9178">AirAsia X (XAX | D7)
                                                        </option>
                                                        <option value="lil" data-select2-id="9179">FlyLal (LIL | TE)
                                                        </option>
                                                        <option value="ndc" data-select2-id="9180">FlyNordic (NDC | LF)
                                                        </option>
                                                        <option value="bbo" data-select2-id="9181">Flybaboo (BBO | F7)
                                                        </option>
                                                        <option value="bee" data-select2-id="9182">Flybe (BEE | BE)
                                                        </option>
                                                        <option value="gsm" data-select2-id="9183">Flyglobespan (GSM |
                                                            B4)</option>
                                                        <option value="fyh" data-select2-id="9184">Flyhy Cargo Airlines
                                                            (FYH)</option>
                                                        <option value="fos" data-select2-id="9185">Formosa Airlines (FOS
                                                            | VY)</option>
                                                        <option value="fre" data-select2-id="9186">Freedom Air (FRE |
                                                            FP)</option>
                                                        <option value="frl" data-select2-id="9187">Freedom Airlines
                                                            (FRL)</option>
                                                        <option value="fft" data-select2-id="9188">Frontier Airlines
                                                            (FFT | F9)</option>
                                                        <option value="fta" data-select2-id="9189">Frontier Flying
                                                            Service (FTA | 2F)</option>
                                                        <option value="gbl" data-select2-id="9190">GB Airways (GBL | GT)
                                                        </option>
                                                        <option value="gia" data-select2-id="9191">Garuda Indonesia (GIA
                                                            | GA)</option>
                                                        <option value="gzp" data-select2-id="9192">Gazpromavia (GZP |
                                                            4G)</option>
                                                        <option value="tgz" data-select2-id="9193">Georgian Airways (TGZ
                                                            | A9)</option>
                                                        <option value="gfg" data-select2-id="9194">Georgian National
                                                            Airlines (GFG | QB)</option>
                                                        <option value="gmi" data-select2-id="9195">Germania (GMI | ST)
                                                        </option>
                                                        <option value="gwi" data-select2-id="9196">Germanwings (GWI |
                                                            4U)</option>
                                                        <option value="ghb" data-select2-id="9197">Ghana International
                                                            Airlines (GHB | G0)</option>
                                                        <option value="gow" data-select2-id="9198">Go Air (GOW | G8)
                                                        </option>
                                                        <option value="gjs" data-select2-id="9199">GoJet Airlines (GJS |
                                                            G7)</option>
                                                        <option value="glo" data-select2-id="9200">Gol Transportes
                                                            Aéreos (GLO | G3)</option>
                                                        <option value="gao" data-select2-id="9201">Golden Air (GAO | DC)
                                                        </option>
                                                        <option value="gla" data-select2-id="9202">Great Lakes Airlines
                                                            (GLA | ZK)</option>
                                                        <option value="tat" data-select2-id="9203">Grupo TACA (TAT | TA)
                                                        </option>
                                                        <option value="gfa" data-select2-id="9204">Gulf Air (GFA)
                                                        </option>
                                                        <option value="gba" data-select2-id="9205">Gulf Air Bahrain (GBA
                                                            | GF)</option>
                                                        <option value="gft" data-select2-id="9206">Gulfstream
                                                            International Airlines (GFT)</option>
                                                        <option value="hag" data-select2-id="9207">Hageland Aviation
                                                            Services (HAG | H6)</option>
                                                        <option value="chh" data-select2-id="9208">Hainan Airlines (CHH
                                                            | HU)</option>
                                                        <option value="ham" data-select2-id="9209">Haiti Ambassador
                                                            Airlines (HAM | 2T)</option>
                                                        <option value="hhi" data-select2-id="9210">Hamburg International
                                                            (HHI | 4R)</option>
                                                        <option value="hlx" data-select2-id="9211">TUIfly (HLX | X3)
                                                        </option>
                                                        <option value="hlf" data-select2-id="9212">Hapagfly (HLF | HF)
                                                        </option>
                                                        <option value="hal" data-select2-id="9213">Hawaiian Airlines
                                                            (HAL | HA)</option>
                                                        <option value="bh" data-select2-id="9214">Hawkair (BH)</option>
                                                        <option value="hfr" data-select2-id="9215">Heli France (HFR |
                                                            8H)</option>
                                                        <option value="jba" data-select2-id="9216">Helijet (JBA | JB)
                                                        </option>
                                                        <option value="hej" data-select2-id="9217">Hellas Jet (HEJ | T4)
                                                        </option>
                                                        <option value="fhe" data-select2-id="9218">Hello (FHE | HW)
                                                        </option>
                                                        <option value="oaw" data-select2-id="9219">Helvetic Airways (OAW
                                                            | 2L)</option>
                                                        <option value="her" data-select2-id="9220">Hex'Air (HER | UD)
                                                        </option>
                                                        <option value="hwy" data-select2-id="9221">Highland Airways
                                                            (HWY)</option>
                                                        <option value="ado" data-select2-id="9222">Hokkaido
                                                            International Airlines (ADO | HD)</option>
                                                        <option value="crk" data-select2-id="9223">Hong Kong Airlines
                                                            (CRK | HX)</option>
                                                        <option value="hke" data-select2-id="9224">Hong Kong Express
                                                            Airways (HKE | UO)</option>
                                                        <option value="qxe" data-select2-id="9225">Horizon Air (QXE |
                                                            QX)</option>
                                                        <option value="hza" data-select2-id="9226">Horizon Airlines (HZA
                                                            | BN)</option>
                                                        <option value="ibe" data-select2-id="9227">Iberia Airlines (IBE
                                                            | IB)</option>
                                                        <option value="iwd" data-select2-id="9228">Iberworld (IWD | TY)
                                                        </option>
                                                        <option value="ibx" data-select2-id="9229">Ibex Airlines (IBX |
                                                            FW)</option>
                                                        <option value="rac" data-select2-id="9230">Icar Air (RAC)
                                                        </option>
                                                        <option value="ice" data-select2-id="9231">Icelandair (ICE | FI)
                                                        </option>
                                                        <option value="itx" data-select2-id="9232">Imair Airlines (ITX |
                                                            IK)</option>
                                                        <option value="igo" data-select2-id="9233">IndiGo Airlines (IGO
                                                            | 6E)</option>
                                                        <option value="iac" data-select2-id="9234">Indian Airlines (IAC
                                                            | IC)</option>
                                                        <option value="ibu" data-select2-id="9235">Indigo (IBU | I9)
                                                        </option>
                                                        <option value="awq" data-select2-id="9236">Indonesia AirAsia
                                                            (AWQ | QZ)</option>
                                                        <option value="iaa" data-select2-id="9237">Indonesian Airlines
                                                            (IAA | IO)</option>
                                                        <option value="iln" data-select2-id="9238">Interair South Africa
                                                            (ILN | D6)</option>
                                                        <option value="suw" data-select2-id="9239">Interavia Airlines
                                                            (SUW | ZA)</option>
                                                        <option value="itk" data-select2-id="9240">Interlink Airlines
                                                            (ITK | ID)</option>
                                                        <option value="isk" data-select2-id="9241">Intersky (ISK | 3L)
                                                        </option>
                                                        <option value="ira" data-select2-id="9242">Iran Air (IRA | IR)
                                                        </option>
                                                        <option value="irc" data-select2-id="9243">Iran Aseman Airlines
                                                            (IRC | EP)</option>
                                                        <option value="iaw" data-select2-id="9244">Iraqi Airways (IAW |
                                                            IA)</option>
                                                        <option value="is" data-select2-id="9245">Island Airlines (IS)
                                                        </option>
                                                        <option value="cgp" data-select2-id="9246">Cargo Plus Aviation
                                                            (CGP | 8L)</option>
                                                        <option value="isw" data-select2-id="9247">Islas Airways (ISW |
                                                            IF)</option>
                                                        <option value="isv" data-select2-id="9248">Islena De Inversiones
                                                            (ISV | WC)</option>
                                                        <option value="isr" data-select2-id="9249">Israir (ISR | 6H)
                                                        </option>
                                                        <option value="ika" data-select2-id="9250">Itek Air (IKA | GI)
                                                        </option>
                                                        <option value="jex" data-select2-id="9251">JAL Express (JEX |
                                                            JC)</option>
                                                        <option value="jaz" data-select2-id="9252">JALways (JAZ | JO)
                                                        </option>
                                                        <option value="jal" data-select2-id="9253">Japan Airlines (JAL |
                                                            JL)</option>
                                                        <option value="jal" data-select2-id="9254">Japan Airlines
                                                            Domestic (JAL | JL)</option>
                                                        <option value="jaa" data-select2-id="9255">Japan Asia Airways
                                                            (JAA | EG)</option>
                                                        <option value="jta" data-select2-id="9256">Japan Transocean Air
                                                            (JTA | NU)</option>
                                                        <option value="jzr" data-select2-id="9257">Jazeera Airways (JZR
                                                            | J9)</option>
                                                        <option value="jja" data-select2-id="9258">Jeju Air (JJA | 7C)
                                                        </option>
                                                        <option value="jai" data-select2-id="9259">Jet Airways (JAI |
                                                            9W)</option>
                                                        <option value="qj" data-select2-id="9260">Jet Airways (QJ)
                                                        </option>
                                                        <option value="jsa" data-select2-id="9261">Jetstar Asia Airways
                                                            (JSA | 3K)</option>
                                                        <option value="exs" data-select2-id="9262">Jet2.com (EXS | LS)
                                                        </option>
                                                        <option value="jfu" data-select2-id="9263">Jet4You (JFU | 8J)
                                                        </option>
                                                        <option value="jbu" data-select2-id="9264">JetBlue Airways (JBU
                                                            | B6)</option>
                                                        <option value="jaf" data-select2-id="9265">Jetairfly (JAF | JF)
                                                        </option>
                                                        <option value="jef" data-select2-id="9266">Jetflite (JEF)
                                                        </option>
                                                        <option value="jst" data-select2-id="9267">Jetstar Airways (JST
                                                            | JQ)</option>
                                                        <option value="dkh" data-select2-id="9268">Juneyao Airlines (DKH
                                                            | HO)</option>
                                                        <option value="kni" data-select2-id="9269">KD Avia (KNI | KD)
                                                        </option>
                                                        <option value="klc" data-select2-id="9270">KLM Cityhopper (KLC |
                                                            WA)</option>
                                                        <option value="klm" data-select2-id="9271">KLM Royal Dutch
                                                            Airlines (KLM | KL)</option>
                                                        <option value="kmf" data-select2-id="9272">Kam Air (KMF | RQ)
                                                        </option>
                                                        <option value="mvd" data-select2-id="9273">Kavminvodyavia (MVD |
                                                            KV)</option>
                                                        <option value="kda" data-select2-id="9274">Kendell Airlines
                                                            (KDA)</option>
                                                        <option value="ken" data-select2-id="9275">Kenmore Air (KEN |
                                                            M5)</option>
                                                        <option value="kqa" data-select2-id="9276">Kenya Airways (KQA |
                                                            KQ)</option>
                                                        <option value="kfr" data-select2-id="9277">Kingfisher Airlines
                                                            (KFR | IT)</option>
                                                        <option value="irk" data-select2-id="9278">Kish Air (IRK | Y9)
                                                        </option>
                                                        <option value="kgl" data-select2-id="9279">Kogalymavia Air
                                                            Company (KGL | 7K)</option>
                                                        <option value="kal" data-select2-id="9280">Korean Air (KAL | KE)
                                                        </option>
                                                        <option value="ksm" data-select2-id="9281">Kosmos (KSM)</option>
                                                        <option value="kjc" data-select2-id="9282">Krasnojarsky Airlines
                                                            (KJC | 7B)</option>
                                                        <option value="kil" data-select2-id="9283">Kuban Airlines (KIL |
                                                            GW)</option>
                                                        <option value="kac" data-select2-id="9284">Kuwait Airways (KAC |
                                                            KU)</option>
                                                        <option value="kzu" data-select2-id="9285">Kuzu Airlines Cargo
                                                            (KZU | GO)</option>
                                                        <option value="lrc" data-select2-id="9286">LACSA (LRC | LR)
                                                        </option>
                                                        <option value="lan" data-select2-id="9287">LAN Airlines (LAN |
                                                            LA)</option>
                                                        <option value="dsm" data-select2-id="9288">LAN Argentina (DSM |
                                                            4M)</option>
                                                        <option value="lxp" data-select2-id="9289">LAN Express (LXP |
                                                            LU)</option>
                                                        <option value="lpe" data-select2-id="9290">LAN Peru (LPE | LP)
                                                        </option>
                                                        <option value="lot" data-select2-id="9291">LOT Polish Airlines
                                                            (LOT | LO)</option>
                                                        <option value="lte" data-select2-id="9292">LTE International
                                                            Airways (LTE | XO)</option>
                                                        <option value="lto" data-select2-id="9293">LTU Austria (LTO |
                                                            L3)</option>
                                                        <option value="lao" data-select2-id="9294">Lao Airlines (LAO |
                                                            QV)</option>
                                                        <option value="ltc" data-select2-id="9295">LatCharter (LTC)
                                                        </option>
                                                        <option value="lda" data-select2-id="9296">Lauda Air (LDA | NG)
                                                        </option>
                                                        <option value="lia" data-select2-id="9297">Leeward Islands Air
                                                            Transport (LIA | LI)</option>
                                                        <option value="laa" data-select2-id="9298">Libyan Arab Airlines
                                                            (LAA | LN)</option>
                                                        <option value="lam" data-select2-id="9299">Linhas A (LAM | LM)
                                                        </option>
                                                        <option value="lni" data-select2-id="9300">Lion Mentari Airlines
                                                            (LNI | JT)</option>
                                                        <option value="lgw" data-select2-id="9301">Luftfahrtgesellschaft
                                                            Walter (LGW | HE)</option>
                                                        <option value="dlh" data-select2-id="9302">Lufthansa (DLH | LH)
                                                        </option>
                                                        <option value="gec" data-select2-id="9303">Lufthansa Cargo (GEC
                                                            | LH)</option>
                                                        <option value="clh" data-select2-id="9304">Lufthansa CityLine
                                                            (CLH | CL)</option>
                                                        <option value="ltr" data-select2-id="9305">Lufttransport (LTR |
                                                            L5)</option>
                                                        <option value="lgl" data-select2-id="9306">Luxair (LGL | LG)
                                                        </option>
                                                        <option value="lpr" data-select2-id="9307">L (LPR | MJ)</option>
                                                        <option value="maa" data-select2-id="9308">MasAir (MAA | M7)
                                                        </option>
                                                        <option value="mak" data-select2-id="9309">MAT Macedonian
                                                            Airlines (MAK | IN)</option>
                                                        <option value="mgl" data-select2-id="9310">MIAT Mongolian
                                                            Airlines (MGL | OM)</option>
                                                        <option value="mnb" data-select2-id="9311">MNG Airlines (MNB |
                                                            MB)</option>
                                                        <option value="mck" data-select2-id="9312">Macair Airlines (MCK
                                                            | CC)</option>
                                                        <option value="dm" data-select2-id="9313">Maersk (DM)</option>
                                                        <option value="irm" data-select2-id="9314">Mahan Air (IRM | W5)
                                                        </option>
                                                        <option value="mas" data-select2-id="9315">Malaysia Airlines
                                                            (MAS | MH)</option>
                                                        <option value="scw" data-select2-id="9316">Malmo Aviation (SCW)
                                                        </option>
                                                        <option value="scw" data-select2-id="9317">Malmö Aviation (SCW |
                                                            TF)</option>
                                                        <option value="mac" data-select2-id="9318">Malta Air Charter
                                                            (MAC | R5)</option>
                                                        <option value="mah" data-select2-id="9319">Malév (MAH | MA)
                                                        </option>
                                                        <option value="mdl" data-select2-id="9320">Mandala Airlines (MDL
                                                            | RI)</option>
                                                        <option value="mda" data-select2-id="9321">Mandarin Airlines
                                                            (MDA | AE)</option>
                                                        <option value="mno" data-select2-id="9322">Mango (MNO | JE)
                                                        </option>
                                                        <option value="mph" data-select2-id="9323">Martinair (MPH | MP)
                                                        </option>
                                                        <option value="mxl" data-select2-id="9324">Maxair (MXL | 8M)
                                                        </option>
                                                        <option value="myd" data-select2-id="9325">Maya Island Air (MYD
                                                            | MW)</option>
                                                        <option value="iss" data-select2-id="9326">Meridiana (ISS | IG)
                                                        </option>
                                                        <option value="mna" data-select2-id="9327">Merpati Nusantara
                                                            Airlines (MNA | MZ)</option>
                                                        <option value="ash" data-select2-id="9328">Mesa Airlines (ASH |
                                                            YV)</option>
                                                        <option value="mes" data-select2-id="9329">Mesaba Airlines (MES
                                                            | XJ)</option>
                                                        <option value="mxa" data-select2-id="9330">Mexicana De Aviaci
                                                            (MXA | MX)</option>
                                                        <option value="mea" data-select2-id="9331">Middle East Airlines
                                                            (MEA | ME)</option>
                                                        <option value="mdw" data-select2-id="9332">Midway Airlines (MDW
                                                            | JI)</option>
                                                        <option value="mep" data-select2-id="9333">Midwest Airlines (MEP
                                                            | YX)</option>
                                                        <option value="mwa" data-select2-id="9334">Midwest Airlines
                                                            (Egypt) (MWA | MY)</option>
                                                        <option value="mdv" data-select2-id="9335">Moldavian Airlines
                                                            (MDV | 2M)</option>
                                                        <option value="mon" data-select2-id="9336">Monarch Airlines (MON
                                                            | ZB)</option>
                                                        <option value="8i" data-select2-id="9337">Myway Airlines (8I)
                                                        </option>
                                                        <option value="mgx" data-select2-id="9338">Montenegro Airlines
                                                            (MGX | YM)</option>
                                                        <option value="mal" data-select2-id="9339">Morningstar Air
                                                            Express (MAL)</option>
                                                        <option value="gai" data-select2-id="9340">Moskovia Airlines
                                                            (GAI | 3R)</option>
                                                        <option value="msi" data-select2-id="9341">Motor Sich (MSI | M9)
                                                        </option>
                                                        <option value="myt" data-select2-id="9342">MyTravel Airways (MYT
                                                            | VZ)</option>
                                                        <option value="uba" data-select2-id="9343">Myanma Airways (UBA |
                                                            UB)</option>
                                                        <option value="mmm" data-select2-id="9344">Myanmar Airways
                                                            International (MMM | 8M)</option>
                                                        <option value="mya" data-select2-id="9345">Myflug (MYA)</option>
                                                        <option value="nas" data-select2-id="9346">Nasair (NAS | UE)
                                                        </option>
                                                        <option value="njs" data-select2-id="9347">National Jet Systems
                                                            (NJS | NC)</option>
                                                        <option value="ntw" data-select2-id="9348">Nationwide Airlines
                                                            (NTW | CE)</option>
                                                        <option value="ron" data-select2-id="9349">Nauru Air Corporation
                                                            (RON | ON)</option>
                                                        <option value="rna" data-select2-id="9350">Nepal Airlines (RNA |
                                                            RA)</option>
                                                        <option value="eja" data-select2-id="9351">NetJets (EJA | 1I)
                                                        </option>
                                                        <option value="nea" data-select2-id="9352">New England Airlines
                                                            (NEA | EJ)</option>
                                                        <option value="ntj" data-select2-id="9353">NextJet (NTJ | 2N)
                                                        </option>
                                                        <option value="nly" data-select2-id="9354">Niki (NLY | HG)
                                                        </option>
                                                        <option value="nok" data-select2-id="9355">Nok Air (NOK | DD)
                                                        </option>
                                                        <option value="ncf" data-select2-id="9356">Norfolk County Flight
                                                            College (NCF)</option>
                                                        <option value="ntm" data-select2-id="9357">North American
                                                            Airlines (NTM)</option>
                                                        <option value="hmr" data-select2-id="9358">North American
                                                            Charters (HMR)</option>
                                                        <option value="u7" data-select2-id="9359">Northern Dene Airways
                                                            (U7)</option>
                                                        <option value="nwa" data-select2-id="9360">Northwest Airlines
                                                            (NWA | NW)</option>
                                                        <option value="plr" data-select2-id="9361">Northwestern Air (PLR
                                                            | J3)</option>
                                                        <option value="nax" data-select2-id="9362">Norwegian Air Shuttle
                                                            (NAX | DY)</option>
                                                        <option value="tfn" data-select2-id="9363">Norwegian Aviation
                                                            College (TFN)</option>
                                                        <option value="lbt" data-select2-id="9364">Nouvel Air Tunisie
                                                            (LBT | BJ)</option>
                                                        <option value="nvr" data-select2-id="9365">Novair (NVR | 1I)
                                                        </option>
                                                        <option value="kne" data-select2-id="9366">Nas Air (KNE | XY)
                                                        </option>
                                                        <option value="ohk" data-select2-id="9367">Oasis Hong Kong
                                                            Airlines (OHK | O8)</option>
                                                        <option value="bcn" data-select2-id="9368">Ocean Air (BCN)
                                                        </option>
                                                        <option value="one" data-select2-id="9369">Oceanair (ONE | O6)
                                                        </option>
                                                        <option value="o2" data-select2-id="9370">Oceanic Airlines (O2)
                                                        </option>
                                                        <option value="oal" data-select2-id="9371">Olympic Airlines (OAL
                                                            | OA)</option>
                                                        <option value="oma" data-select2-id="9372">Oman Air (OMA | WY)
                                                        </option>
                                                        <option value="oae" data-select2-id="9373">Omni Air
                                                            International (OAE | OY)</option>
                                                        <option value="otg" data-select2-id="9374">One Two Go Airlines
                                                            (OTG)</option>
                                                        <option value="ohy" data-select2-id="9375">Onur Air (OHY | 8Q)
                                                        </option>
                                                        <option value="orb" data-select2-id="9376">Orenburg Airlines
                                                            (ORB | R2)</option>
                                                        <option value="oea" data-select2-id="9377">Orient Thai Airlines
                                                            (OEA | OX)</option>
                                                        <option value="ogn" data-select2-id="9378">Origin Pacific
                                                            Airways (OGN | QO)</option>
                                                        <option value="olt" data-select2-id="9379">Ostfriesische
                                                            Lufttransport (OLT | OL)</option>
                                                        <option value="ola" data-select2-id="9380">Overland Airways (OLA
                                                            | OJ)</option>
                                                        <option value="ozj" data-select2-id="9381">Ozjet Airlines (OZJ |
                                                            O7)</option>
                                                        <option value="pnr" data-select2-id="9382">PAN Air (PNR | PV)
                                                        </option>
                                                        <option value="pba" data-select2-id="9383">PB Air (PBA | 9Q)
                                                        </option>
                                                        <option value="pua" data-select2-id="9384">PLUNA (PUA | PU)
                                                        </option>
                                                        <option value="pmt" data-select2-id="9385">PMTair (PMT | U4)
                                                        </option>
                                                        <option value="pic" data-select2-id="9386">Jetstar Pacific (PIC
                                                            | BL)</option>
                                                        <option value="pco" data-select2-id="9387">Pacific Coastal
                                                            Airline (PCO | 8P)</option>
                                                        <option value="pec" data-select2-id="9388">Pacific East Asia
                                                            Cargo Airlines (PEC | Q8)</option>
                                                        <option value="psa" data-select2-id="9389">Pacific Island
                                                            Aviation (PSA)</option>
                                                        <option value="nmi" data-select2-id="9390">Pacific Wings (NMI |
                                                            LW)</option>
                                                        <option value="pia" data-select2-id="9391">Pakistan
                                                            International Airlines (PIA | PK)</option>
                                                        <option value="pmw" data-select2-id="9392">Paramount Airways
                                                            (PMW | I7)</option>
                                                        <option value="ptb" data-select2-id="9393">Passaredo Transportes
                                                            Aereos (PTB)</option>
                                                        <option value="pgt" data-select2-id="9394">Pegasus Airlines (PGT
                                                            | PC)</option>
                                                        <option value="pen" data-select2-id="9395">Peninsula Airways
                                                            (PEN | KS)</option>
                                                        <option value="pal" data-select2-id="9396">Philippine Airlines
                                                            (PAL | PR)</option>
                                                        <option value="pdt" data-select2-id="9397">Piedmont Airlines
                                                            (1948-1989) (PDT | PI)</option>
                                                        <option value="flg" data-select2-id="9398">Pinnacle Airlines
                                                            (FLG | 9E)</option>
                                                        <option value="pot" data-select2-id="9399">Polet (POT)</option>
                                                        <option value="pao" data-select2-id="9400">Polynesian Airlines
                                                            (PAO | PH)</option>
                                                        <option value="poe" data-select2-id="9401">Porter Airlines (POE
                                                            | PD)</option>
                                                        <option value="pga" data-select2-id="9402">Portugalia (PGA | NI)
                                                        </option>
                                                        <option value="pdc" data-select2-id="9403">Potomac Air (PDC |
                                                            BK)</option>
                                                        <option value="prf" data-select2-id="9404">Precision Air (PRF |
                                                            PW)</option>
                                                        <option value="pti" data-select2-id="9405">Privatair (PTI)
                                                        </option>
                                                        <option value="p0" data-select2-id="9406">Proflight Commuter
                                                            Services (P0)</option>
                                                        <option value="qfa" data-select2-id="9407">Qantas (QFA | QF)
                                                        </option>
                                                        <option value="qtr" data-select2-id="9408">Qatar Airways (QTR |
                                                            QR)</option>
                                                        <option value="r6" data-select2-id="9409">RACSA (R6)</option>
                                                        <option value="kin" data-select2-id="9410">Kinloss Flying
                                                            Training Unit (KIN)</option>
                                                        <option value="fn" data-select2-id="9411">Regional Airlines (FN)
                                                        </option>
                                                        <option value="rxa" data-select2-id="9412">Regional Express (RXA
                                                            | ZL)</option>
                                                        <option value="rpa" data-select2-id="9413">Republic Airlines
                                                            (RPA | RW)</option>
                                                        <option value="rph" data-select2-id="9414">Republic Express
                                                            Airlines (RPH | RH)</option>
                                                        <option value="r4" data-select2-id="9415">Rossiya (R4)</option>
                                                        <option value="rar" data-select2-id="9416">Air Rarotonga (RAR |
                                                            GZ)</option>
                                                        <option value="ram" data-select2-id="9417">Royal Air Maroc (RAM
                                                            | AT)</option>
                                                        <option value="rba" data-select2-id="9418">Royal Brunei Airlines
                                                            (RBA | BI)</option>
                                                        <option value="rja" data-select2-id="9419">Royal Jordanian (RJA
                                                            | RJ)</option>
                                                        <option value="rna" data-select2-id="9420">Royal Nepal Airlines
                                                            (RNA | RA)</option>
                                                        <option value="ppw" data-select2-id="9421">Royal Phnom Penh
                                                            Airways (PPW)</option>
                                                        <option value="rlu" data-select2-id="9422">Rusline (RLU)
                                                        </option>
                                                        <option value="rwd" data-select2-id="9423">Rwandair Express (RWD
                                                            | WB)</option>
                                                        <option value="rya" data-select2-id="9424">Ryan Air Services
                                                            (RYA)</option>
                                                        <option value="ryn" data-select2-id="9425">Ryan International
                                                            Airlines (RYN | RD)</option>
                                                        <option value="ryr" data-select2-id="9426">Ryanair (RYR | FR)
                                                        </option>
                                                        <option value="rae" data-select2-id="9427">Régional (RAE | YS)
                                                        </option>
                                                        <option value="rzo" data-select2-id="9428">SATA International
                                                            (RZO | S4)</option>
                                                        <option value="saa" data-select2-id="9429">South African Airways
                                                            (SAA | SA)</option>
                                                        <option value="sai" data-select2-id="9430">Shaheen Air
                                                            International (SAI | NL)</option>
                                                        <option value="sas" data-select2-id="9431">Scandinavian Airlines
                                                            System (SAS | SK)</option>
                                                        <option value="say" data-select2-id="9432">ScotAirways (SAY)
                                                        </option>
                                                        <option value="sbi" data-select2-id="9433">S7 Airlines (SBI |
                                                            S7)</option>
                                                        <option value="sbs" data-select2-id="9434">Seaborne Airlines
                                                            (SBS | BB)</option>
                                                        <option value="sce" data-select2-id="9435">Scenic Airlines (SCE)
                                                        </option>
                                                        <option value="alk" data-select2-id="9436">SriLankan Airlines
                                                            (ALK | UL)</option>
                                                        <option value="scx" data-select2-id="9437">Sun Country Airlines
                                                            (SCX | SY)</option>
                                                        <option value="sea" data-select2-id="9438">Southeast Air (SEA)
                                                        </option>
                                                        <option value="seh" data-select2-id="9439">Sky Express (SEH |
                                                            G3)</option>
                                                        <option value="sej" data-select2-id="9440">Spicejet (SEJ | SG)
                                                        </option>
                                                        <option value="sfj" data-select2-id="9441">Star Flyer (SFJ | 7G)
                                                        </option>
                                                        <option value="sgy" data-select2-id="9442">Skagway Air Service
                                                            (SGY | N5)</option>
                                                        <option value="shd" data-select2-id="9443">Sahara Airlines (SHD)
                                                        </option>
                                                        <option value="sat" data-select2-id="9444">SATA Air Acores (SAT
                                                            | SP)</option>
                                                        <option value="sia" data-select2-id="9445">Singapore Airlines
                                                            (SIA | SQ)</option>
                                                        <option value="sib" data-select2-id="9446">Sibaviatrans (SIB |
                                                            5M)</option>
                                                        <option value="sih" data-select2-id="9447">Skynet Airlines (SIH
                                                            | SI)</option>
                                                        <option value="sjy" data-select2-id="9448">Sriwijaya Air (SJY |
                                                            SJ)</option>
                                                        <option value="smy" data-select2-id="9449">Sama Airlines (SMY |
                                                            ZS)</option>
                                                        <option value="sqc" data-select2-id="9450">Singapore Airlines
                                                            Cargo (SQC | SQ)</option>
                                                        <option value="srh" data-select2-id="9451">Siem Reap Airways
                                                            (SRH | FT)</option>
                                                        <option value="srq" data-select2-id="9452">South East Asian
                                                            Airlines (SRQ | DG)</option>
                                                        <option value="ssv" data-select2-id="9453">Skyservice Airlines
                                                            (SSV | 5G)</option>
                                                        <option value="stu" data-select2-id="9454">Servicios De
                                                            Transportes A (STU | FS)</option>
                                                        <option value="sud" data-select2-id="9455">Sudan Airways (SUD |
                                                            SD)</option>
                                                        <option value="sva" data-select2-id="9456">Saudi Arabian
                                                            Airlines (SVA | SV)</option>
                                                        <option value="swa" data-select2-id="9457">Southwest Airlines
                                                            (SWA | WN)</option>
                                                        <option value="swd" data-select2-id="9458">Southern Winds
                                                            Airlines (SWD | A4)</option>
                                                        <option value="swr" data-select2-id="9459">Swiss International
                                                            Air Lines (SWR | LX)</option>
                                                        <option value="swr" data-select2-id="9460">Swissair (SWR | SR)
                                                        </option>
                                                        <option value="swu" data-select2-id="9461">Swiss European Air
                                                            Lines (SWU)</option>
                                                        <option value="swv" data-select2-id="9462">Swe Fly (SWV | WV)
                                                        </option>
                                                        <option value="sxs" data-select2-id="9463">SunExpress (SXS | XQ)
                                                        </option>
                                                        <option value="syr" data-select2-id="9464">Syrian Arab Airlines
                                                            (SYR | RB)</option>
                                                        <option value="syx" data-select2-id="9465">Skywalk Airlines (SYX
                                                            | AL)</option>
                                                        <option value="cdg" data-select2-id="9466">Shandong Airlines
                                                            (CDG | SC)</option>
                                                        <option value="cno" data-select2-id="9467">SAS Braathens (CNO)
                                                        </option>
                                                        <option value="cqh" data-select2-id="9468">Spring Airlines (CQH
                                                            | 9S)</option>
                                                        <option value="csc" data-select2-id="9469">Sichuan Airlines (CSC
                                                            | 3U)</option>
                                                        <option value="csh" data-select2-id="9470">Shanghai Airlines
                                                            (CSH | FM)</option>
                                                        <option value="csz" data-select2-id="9471">Shenzhen Airlines
                                                            (CSZ | ZH)</option>
                                                        <option value="ero" data-select2-id="9472">Sun D'Or (ERO | 7L)
                                                        </option>
                                                        <option value="esk" data-select2-id="9473">SkyEurope (ESK | NE)
                                                        </option>
                                                        <option value="hsk" data-select2-id="9474">Sky Europe Airlines
                                                            (HSK)</option>
                                                        <option value="jkk" data-select2-id="9475">Spanair (JKK | JK)
                                                        </option>
                                                        <option value="nks" data-select2-id="9476">Spirit Airlines (NKS
                                                            | NK)</option>
                                                        <option value="nse" data-select2-id="9477">SATENA (NSE | 9R)
                                                        </option>
                                                        <option value="ozw" data-select2-id="9478">Skywest Airlines
                                                            (OZW)</option>
                                                        <option value="bbr" data-select2-id="9479">Santa Barbara
                                                            Airlines (BBR | S3)</option>
                                                        <option value="sku" data-select2-id="9480">Sky Airline (SKU |
                                                            H2)</option>
                                                        <option value="skw" data-select2-id="9481">SkyWest (SKW | OO)
                                                        </option>
                                                        <option value="skx" data-select2-id="9482">Skyways Express (SKX
                                                            | JZ)</option>
                                                        <option value="sky" data-select2-id="9483">Skymark Airlines (SKY
                                                            | BC)</option>
                                                        <option value="slk" data-select2-id="9484">SilkAir (SLK | MI)
                                                        </option>
                                                        <option value="slm" data-select2-id="9485">Surinam Airways (SLM
                                                            | PY)</option>
                                                        <option value="snb" data-select2-id="9486">Sterling Airlines
                                                            (SNB | NB)</option>
                                                        <option value="snj" data-select2-id="9487">Skynet Asia Airways
                                                            (SNJ | 6J)</option>
                                                        <option value="sol" data-select2-id="9488">Solomon Airlines (SOL
                                                            | IE)</option>
                                                        <option value="sou" data-select2-id="9489">Southern Airways
                                                            (SOU)</option>
                                                        <option value="sov" data-select2-id="9490">Saratov Aviation
                                                            Division (SOV | 6W)</option>
                                                        <option value="soz" data-select2-id="9491">Sat Airlines (SOZ |
                                                            HZ)</option>
                                                        <option value="spi" data-select2-id="9492">South Pacific Island
                                                            Airways (SPI)</option>
                                                        <option value="tcf" data-select2-id="9493">Shuttle America (TCF
                                                            | S5)</option>
                                                        <option value="vsv" data-select2-id="9494">Scat Air (VSV | DV)
                                                        </option>
                                                        <option value="tae" data-select2-id="9495">TAME (TAE | EQ)
                                                        </option>
                                                        <option value="tam" data-select2-id="9496">TAM Brazilian
                                                            Airlines (TAM | JJ)</option>
                                                        <option value="tap" data-select2-id="9497">TAP Portugal (TAP |
                                                            TP)</option>
                                                        <option value="tar" data-select2-id="9498">Tunisair (TAR | TU)
                                                        </option>
                                                        <option value="tcg" data-select2-id="9499">Thai Air Cargo (TCG |
                                                            T2)</option>
                                                        <option value="tcw" data-select2-id="9500">Thomas Cook Airlines
                                                            (TCW | FQ)</option>
                                                        <option value="tcx" data-select2-id="9501">Thomas Cook Airlines
                                                            (TCX | MT)</option>
                                                        <option value="tgn" data-select2-id="9502">Trigana Air Service
                                                            (TGN)</option>
                                                        <option value="tgw" data-select2-id="9503">Tiger Airways (TGW |
                                                            TR)</option>
                                                        <option value="tgw" data-select2-id="9504">Tiger Airways
                                                            Australia (TGW | TT)</option>
                                                        <option value="tha" data-select2-id="9505">Thai Airways
                                                            International (THA | TG)</option>
                                                        <option value="thk" data-select2-id="9506">Turk Hava Kurumu Hava
                                                            Taksi Isletmesi (THK)</option>
                                                        <option value="aiq" data-select2-id="9507">Thai AirAsia (AIQ |
                                                            FD)</option>
                                                        <option value="thy" data-select2-id="9508">Turkish Airlines (THY
                                                            | TK)</option>
                                                        <option value="til" data-select2-id="9509">Tajikistan
                                                            International Airlines (TIL)</option>
                                                        <option value="tjt" data-select2-id="9510">Twin Jet (TJT | T7)
                                                        </option>
                                                        <option value="tla" data-select2-id="9511">Translift Airways
                                                            (TLA)</option>
                                                        <option value="tma" data-select2-id="9512">Trans Mediterranean
                                                            Airlines (TMA | TL)</option>
                                                        <option value="tnm" data-select2-id="9513">Tiara Air (TNM | 3P)
                                                        </option>
                                                        <option value="tom" data-select2-id="9514">Thomsonfly (TOM | BY)
                                                        </option>
                                                        <option value="tos" data-select2-id="9515">Tropic Air (TOS | PM)
                                                        </option>
                                                        <option value="tpa" data-select2-id="9516">TAMPA (TPA | QT)
                                                        </option>
                                                        <option value="tna" data-select2-id="9517">TransAsia Airways
                                                            (TNA | GE)</option>
                                                        <option value="tra" data-select2-id="9518">Transavia Holland
                                                            (TRA | HV)</option>
                                                        <option value="tcv" data-select2-id="9519">TACV (TCV | VR)
                                                        </option>
                                                        <option value="abs" data-select2-id="9520">Transwest Air (ABS |
                                                            9T)</option>
                                                        <option value="tso" data-select2-id="9521">Transaero Airlines
                                                            (TSO | UN)</option>
                                                        <option value="tua" data-select2-id="9522">Turkmenistan Airlines
                                                            (TUA | T5)</option>
                                                        <option value="tui" data-select2-id="9523">Tuninter (TUI | UG)
                                                        </option>
                                                        <option value="tvs" data-select2-id="9524">Travel Service (TVS |
                                                            QS)</option>
                                                        <option value="blx" data-select2-id="9525">TUIfly Nordic (BLX |
                                                            6B)</option>
                                                        <option value="dta" data-select2-id="9526">TAAG Angola Airlines
                                                            (DTA | DT)</option>
                                                        <option value="hvk" data-select2-id="9527">Turkish Air Force
                                                            (HVK)</option>
                                                        <option value="lap" data-select2-id="9528">TAM Mercosur (LAP |
                                                            PZ)</option>
                                                        <option value="lof" data-select2-id="9529">Trans States Airlines
                                                            (LOF | AX)</option>
                                                        <option value="rot" data-select2-id="9530">Tarom (ROT | RO)
                                                        </option>
                                                        <option value="urn" data-select2-id="9531">Turan Air (URN | 3T)
                                                        </option>
                                                        <option value="tib" data-select2-id="9532">TRIP Linhas A (TIB |
                                                            8R)</option>
                                                        <option value="gwy" data-select2-id="9533">USA3000 Airlines (GWY
                                                            | U5)</option>
                                                        <option value="ual" data-select2-id="9534">United Airlines (UAL
                                                            | UA)</option>
                                                        <option value="uac" data-select2-id="9535">United Air Charters
                                                            (UAC)</option>
                                                        <option value="svr" data-select2-id="9536">Ural Airlines (SVR |
                                                            U6)</option>
                                                        <option value="ukm" data-select2-id="9537">UM Airlines (UKM |
                                                            UF)</option>
                                                        <option value="usa" data-select2-id="9538">US Airways (USA | US)
                                                        </option>
                                                        <option value="ush" data-select2-id="9539">US Helicopter (USH)
                                                        </option>
                                                        <option value="uta" data-select2-id="9540">UTair Aviation (UTA |
                                                            UT)</option>
                                                        <option value="aio" data-select2-id="9541">United States Air
                                                            Force (AIO)</option>
                                                        <option value="uzb" data-select2-id="9542">Uzbekistan Airways
                                                            (UZB | HY)</option>
                                                        <option value="aui" data-select2-id="9543">Ukraine International
                                                            Airlines (AUI | PS)</option>
                                                        <option value="uh" data-select2-id="9544">US Helicopter
                                                            Corporation (UH)</option>
                                                        <option value="vlu" data-select2-id="9545">Valuair (VLU | VF)
                                                        </option>
                                                        <option value="vfc" data-select2-id="9546">Vasco Air (VFC)
                                                        </option>
                                                        <option value="hvn" data-select2-id="9547">Vietnam Airlines (HVN
                                                            | VN)</option>
                                                        <option value="mov" data-select2-id="9548">VIM Airlines (MOV |
                                                            NN)</option>
                                                        <option value="voi" data-select2-id="9549">Volaris (VOI | Y4)
                                                        </option>
                                                        <option value="vda" data-select2-id="9550">Volga-Dnepr Airlines
                                                            (VDA | VI)</option>
                                                        <option value="vrd" data-select2-id="9551">Virgin America (VRD |
                                                            VX)</option>
                                                        <option value="vex" data-select2-id="9552">Virgin Express (VEX |
                                                            TV)</option>
                                                        <option value="vgn" data-select2-id="9553">Virgin Nigeria
                                                            Airways (VGN | VK)</option>
                                                        <option value="vir" data-select2-id="9554">Virgin Atlantic
                                                            Airways (VIR | VS)</option>
                                                        <option value="vvm" data-select2-id="9555">Viva Macau (VVM | ZG)
                                                        </option>
                                                        <option value="vle" data-select2-id="9556">Volare Airlines (VLE
                                                            | VE)</option>
                                                        <option value="vlg" data-select2-id="9557">Vueling Airlines (VLG
                                                            | VY)</option>
                                                        <option value="vlk" data-select2-id="9558">Vladivostok Air (VLK
                                                            | XF)</option>
                                                        <option value="vlo" data-select2-id="9559">Varig Log (VLO | LC)
                                                        </option>
                                                        <option value="voz" data-select2-id="9560">Virgin Australia (VOZ
                                                            | VA)</option>
                                                        <option value="vrn" data-select2-id="9561">VRG Linhas Aereas
                                                            (VRN | RG)</option>
                                                        <option value="vsp" data-select2-id="9562">VASP (VSP | VP)
                                                        </option>
                                                        <option value="vlm" data-select2-id="9563">VLM Airlines (VLM |
                                                            VG)</option>
                                                        <option value="7w" data-select2-id="9564">Wayraper (7W)</option>
                                                        <option value="web" data-select2-id="9565">WebJet Linhas A (WEB
                                                            | WJ)</option>
                                                        <option value="wlc" data-select2-id="9566">Welcome Air (WLC |
                                                            2W)</option>
                                                        <option value="8o" data-select2-id="9567">West Coast Air (8O)
                                                        </option>
                                                        <option value="wja" data-select2-id="9568">WestJet (WJA | WS)
                                                        </option>
                                                        <option value="wal" data-select2-id="9569">Western Airlines (WAL
                                                            | WA)</option>
                                                        <option value="wif" data-select2-id="9570">Widerøe (WIF | WF)
                                                        </option>
                                                        <option value="jet" data-select2-id="9571">Wind Jet (JET | IV)
                                                        </option>
                                                        <option value="won" data-select2-id="9572">Wings Air (WON | IW)
                                                        </option>
                                                        <option value="wzz" data-select2-id="9573">Wizz Air (WZZ | W6)
                                                        </option>
                                                        <option value="wvl" data-select2-id="9574">Wizz Air Hungary (WVL
                                                            | 8Z)</option>
                                                        <option value="woa" data-select2-id="9575">World Airways (WOA |
                                                            WO)</option>
                                                        <option value="seu" data-select2-id="9576">XL Airways France
                                                            (SEU | SE)</option>
                                                        <option value="cxa" data-select2-id="9577">Xiamen Airlines (CXA
                                                            | MF)</option>
                                                        <option value="llm" data-select2-id="9578">Yamal Airlines (LLM |
                                                            YL)</option>
                                                        <option value="iye" data-select2-id="9579">Yemenia (IYE | IY)
                                                        </option>
                                                        <option value="umk" data-select2-id="9580">Yuzhmashavia (UMK)
                                                        </option>
                                                        <option value="tan" data-select2-id="9581">Zanair (TAN)</option>
                                                        <option value="oom" data-select2-id="9582">Zoom Airlines (OOM |
                                                            Z4)</option>
                                                        <option value="tyr" data-select2-id="9583">Tyrolean Airways
                                                            (TYR)</option>
                                                        <option value="8q" data-select2-id="9584">Maldivian Air Taxi
                                                            (8Q)</option>
                                                        <option value="sxr" data-select2-id="9585">Sky Express (SXR |
                                                            XW)</option>
                                                        <option value="rac" data-select2-id="9586">Royal Air Cambodge
                                                            (RAC | VJ)</option>
                                                        <option value="6t" data-select2-id="9587">Air Mandalay (6T)
                                                        </option>
                                                        <option value="abl" data-select2-id="9588">Air Busan (ABL | BX)
                                                        </option>
                                                        <option value="glp" data-select2-id="9589">Globus (GLP | GH)
                                                        </option>
                                                        <option value="kzk" data-select2-id="9590">Air Kazakhstan (KZK |
                                                            9Y)</option>
                                                        <option value="jas" data-select2-id="9591">Japan Air System (JAS
                                                            | JD)</option>
                                                        <option value="ds" data-select2-id="9592">EasyJet (DS) (DS)
                                                        </option>
                                                        <option value="2i" data-select2-id="9593">Star Peru (2I) (2I)
                                                        </option>
                                                        <option value="kw" data-select2-id="9594">Carnival Air Lines
                                                            (KW)</option>
                                                        <option value="ubd" data-select2-id="9595">United Airways (UBD |
                                                            4H)</option>
                                                        <option value="ffv" data-select2-id="9596">Fly540 (FFV | 5H)
                                                        </option>
                                                        <option value="tvf" data-select2-id="9597">Transavia France (TVF
                                                            | TO)</option>
                                                        <option value="mku" data-select2-id="9598">Island Air (WP) (MKU
                                                            | WP)</option>
                                                        <option value="uia" data-select2-id="9599">Uni Air (UIA | B7)
                                                        </option>
                                                        <option value="yd" data-select2-id="9600">Gomelavia (YD)
                                                        </option>
                                                        <option value="rwz" data-select2-id="9601">Red Wings (RWZ | WZ)
                                                        </option>
                                                        <option value="11" data-select2-id="9602">TUIfly (X3) (11)
                                                        </option>
                                                        <option value="fxx" data-select2-id="9603">Felix Airways (FXX |
                                                            FU)</option>
                                                        <option value="koq" data-select2-id="9604">Kostromskie Avialinii
                                                            (KOQ | K1)</option>
                                                        <option value="gfy" data-select2-id="9605">Greenfly (GFY | XX)
                                                        </option>
                                                        <option value="7j" data-select2-id="9606">Tajik Air (7J)
                                                        </option>
                                                        <option value="tm" data-select2-id="9607">Air Mozambique (TM)
                                                        </option>
                                                        <option value="elk" data-select2-id="9608">ELK Airways (ELK |
                                                            --)</option>
                                                        <option value="gbk" data-select2-id="9609">Gabon Airlines (GBK |
                                                            GY)</option>
                                                        <option value="mca" data-select2-id="9610">MCA Airlines (MCA)
                                                        </option>
                                                        <option value="mav" data-select2-id="9611">Maldivo Airlines (MAV
                                                            | ML)</option>
                                                        <option value="vnp" data-select2-id="9612">Virgin Pacific (VNP |
                                                            VH)</option>
                                                        <option value="z2" data-select2-id="9613">Zest Air (Z2)</option>
                                                        <option value="hk" data-select2-id="9614">Yangon Airways (HK)
                                                        </option>
                                                        <option value="esr" data-select2-id="9615">Eastar Jet (ESR | ZE)
                                                        </option>
                                                        <option value="jna" data-select2-id="9616">Jin Air (JNA | LJ)
                                                        </option>
                                                        <option value="kw1" data-select2-id="9617">Wataniya Airways
                                                            (KW1)</option>
                                                        <option value="3o" data-select2-id="9618">Air Arabia Maroc (3O)
                                                        </option>
                                                        <option value="ba1" data-select2-id="9619">Baltic Air Lines (BA1
                                                            | B1)</option>
                                                        <option value="ycc" data-select2-id="9620">Ciel Canadien (YCC |
                                                            YC)</option>
                                                        <option value="ycp" data-select2-id="9621">Canadian National
                                                            Airways (YCP | CN)</option>
                                                        <option value="4aa" data-select2-id="9622">Epic Holiday (4AA |
                                                            FA)</option>
                                                        <option value="axc" data-select2-id="9623">Indochina Airlines
                                                            (AXC)</option>
                                                        <option value="3i" data-select2-id="9624">Air Comet Chile (3I)
                                                        </option>
                                                        <option value="flb" data-select2-id="9625">German Air Force -
                                                            FLB (FLB)</option>
                                                        <option value="lbl" data-select2-id="9626">Line Blue (LBL | L8)
                                                        </option>
                                                        <option value="llc" data-select2-id="9627">FlyLAL Charters (LLC)
                                                        </option>
                                                        <option value="sz" data-select2-id="9628">Salzburg Arrows (SZ)
                                                        </option>
                                                        <option value="txw" data-select2-id="9629">Texas Wings (TXW |
                                                            TQ)</option>
                                                        <option value="dsy" data-select2-id="9630">Dennis Sky (DSY | DH)
                                                        </option>
                                                        <option value="zz" data-select2-id="9631">Zz (ZZ)</option>
                                                        <option value="a1f" data-select2-id="9632">Atifly (A1F | A1)
                                                        </option>
                                                        <option value="szb" data-select2-id="9633">Aerolineas Heredas
                                                            Santa Maria (SZB)</option>
                                                        <option value="99" data-select2-id="9634">Ciao Air (99)</option>
                                                        <option value="jrb" data-select2-id="9635">Jc Royal.britannica
                                                            (JRB)</option>
                                                        <option value="5p" data-select2-id="9636">Pal Airlines (5P)
                                                        </option>
                                                        <option value="ca1" data-select2-id="9637">CanXpress (CA1 | C1)
                                                        </option>
                                                        <option value="v5" data-select2-id="9638">Danube Wings (V5) (V5)
                                                        </option>
                                                        <option value="sha" data-select2-id="9639">Sharp Airlines (SHA |
                                                            SH)</option>
                                                        <option value="cap" data-select2-id="9640">CanXplorer (CAP | C2)
                                                        </option>
                                                        <option value="qa" data-select2-id="9641">Click (Mexicana) (QA)
                                                        </option>
                                                        <option value="we1" data-select2-id="9642">World Experience
                                                            Airline (WE1 | W1)</option>
                                                        <option value="j4" data-select2-id="9643">ALAK (J4)</option>
                                                        <option value="3e" data-select2-id="9644">Air Choice One (3E)
                                                        </option>
                                                        <option value="gcr" data-select2-id="9645">Tianjin Airlines
                                                            (GCR)</option>
                                                        <option value="kn" data-select2-id="9646">China United (KN)
                                                        </option>
                                                        <option value="loc" data-select2-id="9647">Locair (LOC | ZQ)
                                                        </option>
                                                        <option value="4q" data-select2-id="9648">Safi Airlines (4Q)
                                                        </option>
                                                        <option value="sqh" data-select2-id="9649">SeaPort Airlines (SQH
                                                            | K5)</option>
                                                        <option value="s6" data-select2-id="9650">Salmon Air (S6)
                                                        </option>
                                                        <option value="1" data-select2-id="9651">Bobb Air Freight (1)
                                                        </option>
                                                        <option value="hcw" data-select2-id="9652">Star1 Airlines (HCW |
                                                            V9)</option>
                                                        <option value="6d" data-select2-id="9653">Pelita (6D)</option>
                                                        <option value="j5" data-select2-id="9654">Alaska Seaplane
                                                            Service (J5)</option>
                                                        <option value="enj" data-select2-id="9655">Enerjet (ENJ)
                                                        </option>
                                                        <option value="mxi" data-select2-id="9656">MexicanaLink (MXI |
                                                            I6)</option>
                                                        <option value="isx" data-select2-id="9657">Island Spirit (ISX |
                                                            IP)</option>
                                                        <option value="t0" data-select2-id="9658">TACA Peru (T0)
                                                        </option>
                                                        <option value="obs" data-select2-id="9659">Orbest (OBS)</option>
                                                        <option value="soa" data-select2-id="9660">Southern Air Charter
                                                            (SOA)</option>
                                                        <option value="svg" data-select2-id="9661">SVG Air (SVG)
                                                        </option>
                                                        <option value="cey" data-select2-id="9662">Air Century (CEY)
                                                        </option>
                                                        <option value="7q" data-select2-id="9663">Pan Am World Airways
                                                            Dominicana (7Q)</option>
                                                        <option value="pf" data-select2-id="9664">Primera Air (PF)
                                                        </option>
                                                        <option value="3s" data-select2-id="9665">Air Antilles Express
                                                            (3S)</option>
                                                        <option value="ols" data-select2-id="9666">Sol Lineas Aereas
                                                            (OLS)</option>
                                                        <option value="rep" data-select2-id="9667">Regional Paraguaya
                                                            (REP | P7)</option>
                                                        <option value="v6" data-select2-id="9668">VIP Ecuador (V6)
                                                        </option>
                                                        <option value="ndn" data-select2-id="9669">Transportes Aereos
                                                            Cielos Andinos (NDN)</option>
                                                        <option value="p9" data-select2-id="9670">Peruvian Airlines (P9)
                                                        </option>
                                                        <option value="efy" data-select2-id="9671">EasyFly (EFY)
                                                        </option>
                                                        <option value="ЯП" data-select2-id="9672">Polar Airlines (ЯП)
                                                        </option>
                                                        <option value="oc" data-select2-id="9673">Catovair (OC)</option>
                                                        <option value="anu" data-select2-id="9674">Andalus Lineas Aereas
                                                            (ANU)</option>
                                                        <option value="dcd" data-select2-id="9675">Air 26 (DCD)</option>
                                                        <option value="mtw" data-select2-id="9676">Mauritania Airways
                                                            (MTW)</option>
                                                        <option value="cel" data-select2-id="9677">CEIBA
                                                            Intercontinental (CEL)</option>
                                                        <option value="7z" data-select2-id="9678">Halcyonair (7Z)
                                                        </option>
                                                        <option value="4p" data-select2-id="9679">Business Aviation (4P)
                                                        </option>
                                                        <option value="e9" data-select2-id="9680">Compagnie Africaine
                                                            D\'Aviation (E9)</option>
                                                        <option value="k8" data-select2-id="9681">Zambia Skyways (K8)
                                                        </option>
                                                        <option value="lmu" data-select2-id="9682">AlMasria Universal
                                                            Airlines (LMU | UJ)</option>
                                                        <option value="mse" data-select2-id="9683">EgyptAir Express
                                                            (MSE)</option>
                                                        <option value="6y" data-select2-id="9684">SmartLynx Airlines
                                                            (6Y)</option>
                                                        <option value="eud" data-select2-id="9685">Air Italy Egypt (EUD)
                                                        </option>
                                                        <option value="kbr" data-select2-id="9686">KoralBlue Airlines
                                                            (KBR | K7)</option>
                                                        <option value="wrc" data-select2-id="9687">Wind Rose Aviation
                                                            (WRC)</option>
                                                        <option value="gie" data-select2-id="9688">Elysian Airlines (GIE
                                                            | E4)</option>
                                                        <option value="sen" data-select2-id="9689">Sevenair (SEN)
                                                        </option>
                                                        <option value="imp" data-select2-id="9690">Hellenic Imperial
                                                            Airways (IMP | HT)</option>
                                                        <option value="aan" data-select2-id="9691">Amsterdam Airlines
                                                            (AAN | WD)</option>
                                                        <option value="nak" data-select2-id="9692">Arik Niger (NAK | Q9)
                                                        </option>
                                                        <option value="da" data-select2-id="9693">Dana Air (DA)</option>
                                                        <option value="stp" data-select2-id="9694">STP Airways (STP |
                                                            8F)</option>
                                                        <option value="7y" data-select2-id="9695">Med Airways (7Y)
                                                        </option>
                                                        <option value="sju" data-select2-id="9696">Skyjet Airlines (SJU
                                                            | UQ)</option>
                                                        <option value="g6" data-select2-id="9697">Air Volga (G6)
                                                        </option>
                                                        <option value="tdk" data-select2-id="9698">Transavia Denmark
                                                            (TDK)</option>
                                                        <option value="rfj" data-select2-id="9699">Royal Falcon (RFJ |
                                                            RL)</option>
                                                        <option value="mjx" data-select2-id="9700">Euroline (MJX | 4L)
                                                        </option>
                                                        <option value="trk" data-select2-id="9701">Turkuaz Airlines
                                                            (TRK)</option>
                                                        <option value="zf" data-select2-id="9702">Athens Airways (ZF)
                                                        </option>
                                                        <option value="vkh" data-select2-id="9703">Viking Hellas (VKH |
                                                            VQ)</option>
                                                        <option value="fna" data-select2-id="9704">Norlandair (FNA)
                                                        </option>
                                                        <option value="fvm" data-select2-id="9705">Flugfelag
                                                            Vestmannaeyja (FVM)</option>
                                                        <option value="dz" data-select2-id="9706">Starline.kz (DZ)
                                                        </option>
                                                        <option value="l7" data-select2-id="9707">Lugansk Airlines (L7)
                                                        </option>
                                                        <option value="6p" data-select2-id="9708">Gryphon Airlines (6P)
                                                        </option>
                                                        <option value="gdr" data-select2-id="9709">Gadair European
                                                            Airlines (GDR | GP)</option>
                                                        <option value="mnp" data-select2-id="9710">Spirit Of Manila
                                                            Airlines (MNP | SM)</option>
                                                        <option value="cqn" data-select2-id="9711">Chongqing Airlines
                                                            (CQN | OQ)</option>
                                                        <option value="gdc" data-select2-id="9712">Grand China Air (GDC)
                                                        </option>
                                                        <option value="chb" data-select2-id="9713">West Air China (CHB |
                                                            PN)</option>
                                                        <option value="qax" data-select2-id="9714">QatXpress (QAX | C3)
                                                        </option>
                                                        <option value="1ch" data-select2-id="9715">OneChina (1CH | 1C)
                                                        </option>
                                                        <option value="y7" data-select2-id="9716">NordStar Airlines (Y7)
                                                        </option>
                                                        <option value="joy" data-select2-id="9717">Joy Air (JOY | JR)
                                                        </option>
                                                        <option value="cd" data-select2-id="9718">Air India Regional
                                                            (CD)</option>
                                                        <option value="9h" data-select2-id="9719">MDLR Airlines (9H)
                                                        </option>
                                                        <option value="jgn" data-select2-id="9720">Jagson Airlines (JGN)
                                                        </option>
                                                        <option value="q2" data-select2-id="9721">Maldivian (Q2)
                                                        </option>
                                                        <option value="xn" data-select2-id="9722">Xpressair (XN)
                                                        </option>
                                                        <option value="vc" data-select2-id="9723">Strategic Airlines
                                                            (VC)</option>
                                                        <option value="qfz" data-select2-id="9724">Fars Air Qeshm (QFZ)
                                                        </option>
                                                        <option value="eaa" data-select2-id="9725">Eastok Avia (EAA)
                                                        </option>
                                                        <option value="jpu" data-select2-id="9726">Jupiter Airlines
                                                            (JPU)</option>
                                                        <option value="vis" data-select2-id="9727">Vision Air
                                                            International (VIS)</option>
                                                        <option value="na" data-select2-id="9728">Al-Naser Airlines (NA)
                                                        </option>
                                                        <option value="jh" data-select2-id="9729">Fuji Dream Airlines
                                                            (JH)</option>
                                                        <option value="kea" data-select2-id="9730">Korea Express Air
                                                            (KEA)</option>
                                                        <option value="eza" data-select2-id="9731">Eznis Airways (EZA)
                                                        </option>
                                                        <option value="pfl" data-select2-id="9732">Pacific Flier (PFL)
                                                        </option>
                                                        <option value="psb" data-select2-id="9733">Syrian Pearl Airlines
                                                            (PSB)</option>
                                                        <option value="5e" data-select2-id="9734">SGA Airlines (5E)
                                                        </option>
                                                        <option value="f8" data-select2-id="9735">Air2there (F8)
                                                        </option>
                                                        <option value="ao" data-select2-id="9736">Avianova (Russia) (AO)
                                                        </option>
                                                        <option value="ipv" data-select2-id="9737">Parmiss Airlines
                                                            (IPV) (IPV | PA)</option>
                                                        <option value="euv" data-select2-id="9738">EuropeSky (EUV | ES)
                                                        </option>
                                                        <option value="bze" data-select2-id="9739">BRAZIL AIR (BZE | GB)
                                                        </option>
                                                        <option value="ome" data-select2-id="9740">Homer Air (OME | MR)
                                                        </option>
                                                        <option value="--+" data-select2-id="9741">U.S. Air (--+ | -+)
                                                        </option>
                                                        <option value="\'\" data-select2-id="9742">Jayrow (\'\ | \')
                                                        </option>
                                                        <option value=";;" data-select2-id="9743">Wilderness Air (;;)
                                                        </option>
                                                        <option value="^^" data-select2-id="9744">Whitaker Air (^^)
                                                        </option>
                                                        <option value="pqw" data-select2-id="9745">PanAm World Airways
                                                            (PQW | WQ)</option>
                                                        <option value="vwa" data-select2-id="9746">Virginwings (VWA |
                                                            YY)</option>
                                                        <option value="ksy" data-select2-id="9747">KSY (KSY | KY)
                                                        </option>
                                                        <option value="bqb" data-select2-id="9748">Buquebus Líneas
                                                            Aéreas (BQB | BQ)</option>
                                                        <option value="kol" data-select2-id="9749">SOCHI AIR (KOL | CQ)
                                                        </option>
                                                        <option value="wau" data-select2-id="9750">Wizz Air Ukraine (WAU
                                                            | WU)</option>
                                                        <option value="vvn" data-select2-id="9751">88 (VVN | 47)
                                                        </option>
                                                        <option value="lmm" data-select2-id="9752">LCM AIRLINES (LMM |
                                                            LQ)</option>
                                                        <option value="k6" data-select2-id="9753">Cambodia Angkor Air
                                                            (K6) (K6)</option>
                                                        <option value="69" data-select2-id="9754">Royal European
                                                            Airlines (69)</option>
                                                        <option value="t&amp;o" data-select2-id="9755">Tom\'s &amp; Co
                                                            Airliners (T&amp;O | &amp;T)</option>
                                                        <option value="azu" data-select2-id="9756">Azul (AZU | AD)
                                                        </option>
                                                        <option value="loo" data-select2-id="9757">LSM Airlines (LOO |
                                                            PQ)</option>
                                                        <option value="pzy" data-select2-id="9758">Zapolyarie Airlines
                                                            (PZY)</option>
                                                        <option value="fn1" data-select2-id="9759">Finlandian (FN1)
                                                        </option>
                                                        <option value="lix" data-select2-id="9760">LionXpress (LIX | C4)
                                                        </option>
                                                        <option value="gk" data-select2-id="9761">Genesis (GK)</option>
                                                        <option value="xz" data-select2-id="9762">Congo Express (XZ)
                                                        </option>
                                                        <option value="fdb" data-select2-id="9763">Fly Dubai (FDB | FZ)
                                                        </option>
                                                        <option value="mdo" data-select2-id="9764">Domenican Airlines
                                                            (MDO | D1)</option>
                                                        <option value="2co" data-select2-id="9765">ConneX European
                                                            Airline (2CO)</option>
                                                        <option value="axz" data-select2-id="9766">Aereonautica Militare
                                                            (AXZ | JY)</option>
                                                        <option value="kls" data-select2-id="9767">Kal Star Aviation
                                                            (KLS)</option>
                                                        <option value="yzz" data-select2-id="9768">LSM AIRLINES (YZZ |
                                                            YZ)</option>
                                                        <option value="ur" data-select2-id="9769">UTair-Express (UR)
                                                        </option>
                                                        <option value="g5" data-select2-id="9770">Huaxia (G5)</option>
                                                        <option value="zzz" data-select2-id="9771">Zabaykalskii Airlines
                                                            (ZZZ | ZP)</option>
                                                        <option value="xbm" data-select2-id="9772">CBM America (XBM)
                                                        </option>
                                                        <option value="1qa" data-select2-id="9773">Marysya Airlines (1QA
                                                            | M4)</option>
                                                        <option value="n1" data-select2-id="9774">N1 (N1)</option>
                                                        <option value="4z" data-select2-id="9775">Airlink (SAA) (4Z)
                                                        </option>
                                                        <option value="wfx" data-select2-id="9776">Westfalia Express VA
                                                            (WFX)</option>
                                                        <option value="3b" data-select2-id="9777">JobAir (3B)</option>
                                                        <option value="bsa" data-select2-id="9778">Black Stallion
                                                            Airways (BSA | BZ)</option>
                                                        <option value="ger" data-select2-id="9779">German International
                                                            Air Lines (GER | GM)</option>
                                                        <option value="tbz" data-select2-id="9780">TrasBrasil (TBZ | TB)
                                                        </option>
                                                        <option value="ths" data-select2-id="9781">TransBrasil Airlines
                                                            (THS | TH)</option>
                                                        <option value="9c" data-select2-id="9782">China SSS (9C)
                                                        </option>
                                                        <option value="iia" data-select2-id="9783">AIR INDOCHINE (IIA)
                                                        </option>
                                                        <option value="hpy" data-select2-id="9784">Happy Air (HPY)
                                                        </option>
                                                        <option value="srb" data-select2-id="9785">Solar Air (SRB)
                                                        </option>
                                                        <option value="mkg" data-select2-id="9786">Air Mekong (MKG | P8)
                                                        </option>
                                                        <option value="h3" data-select2-id="9787">Harbour Air (Priv)
                                                            (H3)</option>
                                                        <option value="aho" data-select2-id="9788">Air Hamburg (AHO)
                                                            (AHO | HH)</option>
                                                        <option value="ztt" data-select2-id="9789">ZABAIKAL AIRLINES
                                                            (ZTT | Z6)</option>
                                                        <option value="thi" data-select2-id="9790">TransHolding (THI |
                                                            TI)</option>
                                                        <option value="szz" data-select2-id="9791">SUR Lineas Aereas
                                                            (SZZ)</option>
                                                        <option value="aa1" data-select2-id="9792">Aerolineas Africanas
                                                            (AA1)</option>
                                                        <option value="yt" data-select2-id="9793">Yeti Airways (YT)
                                                        </option>
                                                        <option value="y1" data-select2-id="9794">Yellowstone Club
                                                            Private Shuttle (Y1)</option>
                                                        <option value="ns" data-select2-id="9795">Caucasus Airlines (NS)
                                                        </option>
                                                        <option value="sa1" data-select2-id="9796">Serbian Airlines (SA1
                                                            | S1)</option>
                                                        <option value="wm" data-select2-id="9797">Windward Islands
                                                            Airways (WM)</option>
                                                        <option value="tys" data-select2-id="9798">TransHolding System
                                                            (TYS | YO)</option>
                                                        <option value="ccc" data-select2-id="9799">CCML Airlines (CCC |
                                                            CB)</option>
                                                        <option value="elc" data-select2-id="9800">Small Planet Airlines
                                                            (ELC)</option>
                                                        <option value="fbl" data-select2-id="9801">Fly Brasil (FBL | F1)
                                                        </option>
                                                        <option value="cif" data-select2-id="9802">CB Airways UK (
                                                            Interliging Flights ) (CIF | 1F)</option>
                                                        <option value="3ff" data-select2-id="9803">Fly Colombia (
                                                            Interliging Flights ) (3FF | 3F)</option>
                                                        <option value="tp6" data-select2-id="9804">Trans Pas Air (TP6 |
                                                            T6)</option>
                                                        <option value="МИ" data-select2-id="9805">KMV (МИ)</option>
                                                        <option value="hym" data-select2-id="9806">Himalayan Airlines
                                                            (HYM | HC)</option>
                                                        <option value="ig1" data-select2-id="9807">Indya Airline Group
                                                            (IG1 | G1)</option>
                                                        <option value="swg" data-select2-id="9808">Sunwing (SWG | WG)
                                                        </option>
                                                        <option value="twd" data-select2-id="9809">Turkish Wings
                                                            Domestic (TWD)</option>
                                                        <option value="zxy" data-select2-id="9810">Japan Regio (ZXY |
                                                            ZX)</option>
                                                        <option value="ixo" data-select2-id="9811">OCEAN AIR CARGO (IXO)
                                                        </option>
                                                        <option value="n0" data-select2-id="9812">Norte Lineas Aereas
                                                            (N0)</option>
                                                        <option value="w7" data-select2-id="9813">Austral Brasil (W7)
                                                        </option>
                                                        <option value="h9" data-select2-id="9814">PEGASUS AIRLINES- (H9)
                                                        </option>
                                                        <option value="nx1" data-select2-id="9815">Nihon.jet Connect
                                                            (NX1)</option>
                                                        <option value="qc" data-select2-id="9816">Camair-co (QC)
                                                        </option>
                                                        <option value="skv" data-select2-id="9817">Sky Regional (SKV |
                                                            RS)</option>
                                                        <option value="uww" data-select2-id="9818">LSM International
                                                            (UWW | II)</option>
                                                        <option value="buu" data-select2-id="9819">Baikotovitchestrian
                                                            Airlines (BUU | BU)</option>
                                                        <option value="ljj" data-select2-id="9820">Luchsh Airlines (LJJ
                                                            | L4)</option>
                                                        <option value="qqq" data-select2-id="9821">ENTERair (QQQ)
                                                        </option>
                                                        <option value="6u" data-select2-id="9822">Air Cargo Germany (6U)
                                                        </option>
                                                        <option value="ztf" data-select2-id="9823">Mongolian
                                                            International Air Lines (ZTF | 7M)</option>
                                                        <option value="twb" data-select2-id="9824">Tway Airlines (TWB |
                                                            TW)</option>
                                                        <option value="hi" data-select2-id="9825">Papillon Grand Canyon
                                                            Helicopters (HI)</option>
                                                        <option value="jsr" data-select2-id="9826">Jusur Airways (JSR |
                                                            JX)</option>
                                                        <option value="nxb" data-select2-id="9827">NEXT Brasil (NXB |
                                                            XB)</option>
                                                        <option value="wer" data-select2-id="9828">AeroWorld (WER | W4)
                                                        </option>
                                                        <option value="gn" data-select2-id="9829">GNB Linhas Aereas (GN)
                                                        </option>
                                                        <option value="es2" data-select2-id="9830">Usa Sky Cargo (ES2 |
                                                            E1)</option>
                                                        <option value="hnx" data-select2-id="9831">Hankook Airline (HNX
                                                            | HN)</option>
                                                        <option value="z7" data-select2-id="9832">REDjet (Z7)</option>
                                                        <option value="pt" data-select2-id="9833">Red Jet Andes (PT)
                                                        </option>
                                                        <option value="qy" data-select2-id="9834">Red Jet Canada (QY)
                                                        </option>
                                                        <option value="srn" data-select2-id="9835">Sprintair (SRN)
                                                        </option>
                                                        <option value="4x" data-select2-id="9836">Red Jet Mexico (4X)
                                                        </option>
                                                        <option value="mrs" data-select2-id="9837">Marusya Airways (MRS
                                                            | Y8)</option>
                                                        <option value="err" data-select2-id="9838">Era Alaska (ERR | 7H)
                                                        </option>
                                                        <option value="rrj" data-select2-id="9839">AirRussia (RRJ | R8)
                                                        </option>
                                                        <option value="ha1" data-select2-id="9840">Hankook Air US (HA1 |
                                                            H1)</option>
                                                        <option value="smw" data-select2-id="9841">Carpatair Flight
                                                            Training (SMW)</option>
                                                        <option value="rsy" data-select2-id="9842">I-Fly (RSY | H5)
                                                        </option>
                                                        <option value="wtj" data-select2-id="9843">Whitejets (WTJ)
                                                        </option>
                                                        <option value="vkj" data-select2-id="9844">VickJet (VKJ | KT)
                                                        </option>
                                                        <option value="xv" data-select2-id="9845">BVI Airways (XV)
                                                        </option>
                                                        <option value="hay" data-select2-id="9846">Hamburg Airways (HAY)
                                                        </option>
                                                        <option value="slc" data-select2-id="9847">Salsa D\'Haiti (SLC |
                                                            SO)</option>
                                                        <option value="zj" data-select2-id="9848">Zambezi Airlines (ZMA)
                                                            (ZJ)</option>
                                                        <option value="knd" data-select2-id="9849">Kan Air (KND)
                                                        </option>
                                                        <option value="cud" data-select2-id="9850">Air Cudlua (CUD)
                                                        </option>
                                                        <option value="yq" data-select2-id="9851">Polet Airlines (Priv)
                                                            (YQ)</option>
                                                        <option value="axe" data-select2-id="9852">Air Explore (AXE)
                                                        </option>
                                                        <option value="n12" data-select2-id="9853">12 North (N12 | 12)
                                                        </option>
                                                        <option value="hcc" data-select2-id="9854">Holidays Czech
                                                            Airlines (HCC)</option>
                                                        <option value="coe" data-select2-id="9855">Comtel Air (COE)
                                                        </option>
                                                        <option value="mic" data-select2-id="9856">Mint Airways (MIC)
                                                        </option>
                                                        <option value="obt" data-select2-id="9857">Orbit Airlines (OBT)
                                                        </option>
                                                        <option value="bur" data-select2-id="9858">Air Bucharest (BUR)
                                                        </option>
                                                        <option value="lav" data-select2-id="9859">AlbaStar (LAV)
                                                        </option>
                                                        <option value="mai" data-select2-id="9860">Mauritania Airlines
                                                            International (MAI | L6)</option>
                                                        <option value="mkd" data-select2-id="9861">MAT Airways (MKD |
                                                            6F)</option>
                                                        <option value="awm" data-select2-id="9862">Asian Wings Airways
                                                            (AWM | AW)</option>
                                                        <option value="rbg" data-select2-id="9863">Air Arabia Egypt (RBG
                                                            | E5)</option>
                                                        <option value="egs" data-select2-id="9864">Eagles Airlines (EGS)
                                                        </option>
                                                        <option value="yep" data-select2-id="9865">YES Airways (YEP)
                                                        </option>
                                                        <option value="ct" data-select2-id="9866">Alitalia Cityliner
                                                            (CT)</option>
                                                        <option value="dsv" data-select2-id="9867">Direct Aero Services
                                                            (DSV)</option>
                                                        <option value="mdp" data-select2-id="9868">Medallion Air (MDP)
                                                        </option>
                                                        <option value="orc" data-select2-id="9869">Orchid Airlines (ORC
                                                            | OI)</option>
                                                        <option value="awa" data-select2-id="9870">Asia Wings (AWA | Y5)
                                                        </option>
                                                        <option value="gnn" data-select2-id="9871">Georgian
                                                            International Airlines (GNN)</option>
                                                        <option value="btm" data-select2-id="9872">Air Batumi (BTM)
                                                        </option>
                                                        <option value="xr" data-select2-id="9873">Skywest Australia (XR)
                                                        </option>
                                                        <option value="nia" data-select2-id="9874">Nile Air (NIA | NP)
                                                        </option>
                                                        <option value="fdd" data-select2-id="9875">Feeder Airlines (FDD)
                                                        </option>
                                                        <option value="sgg" data-select2-id="9876">Senegal Airlines (SGG
                                                            | DN)</option>
                                                        <option value="6i" data-select2-id="9877">Fly 6ix (6I)</option>
                                                        <option value="s9" data-select2-id="9878">Starbow Airlines (S9)
                                                        </option>
                                                        <option value="cx0" data-select2-id="9879">Copenhagen Express
                                                            (CX0 | 0X)</option>
                                                        <option value="bcc" data-select2-id="9880">BusinessAir (BCC |
                                                            8B)</option>
                                                        <option value="yr" data-select2-id="9881">SENIC AIRLINES (YR)
                                                        </option>
                                                        <option value="xoj" data-select2-id="9882">XOJET (XOJ)</option>
                                                        <option value="cr7" data-select2-id="9883">Sky Wing Pacific (CR7
                                                            | C7)</option>
                                                        <option value="beu" data-select2-id="9884">Bateleur Air (BEU)
                                                        </option>
                                                        <option value="ai0" data-select2-id="9885">Air Indus (AI0 | PP)
                                                        </option>
                                                        <option value="oai" data-select2-id="9886">Orbit International
                                                            Airlines (OAI)</option>
                                                        <option value="oar" data-select2-id="9887">Orbit Regional
                                                            Airlines (OAR)</option>
                                                        <option value="oan" data-select2-id="9888">Orbit Atlantic
                                                            Airways (OAN)</option>
                                                        <option value="voo" data-select2-id="9889">Volotea (VOO)
                                                        </option>
                                                        <option value="mm" data-select2-id="9890">Peach Aviation (MM)
                                                        </option>
                                                        <option value="hth" data-select2-id="9891">Helitt Líneas Aéreas
                                                            (HTH)</option>
                                                        <option value="rsd" data-select2-id="9892">Russia State
                                                            Transport (RSD)</option>
                                                        <option value="mwi" data-select2-id="9893">Malaysia Wings (MWI)
                                                        </option>
                                                        <option value="abi" data-select2-id="9894">Aviabus (ABI | U1)
                                                        </option>
                                                        <option value="mjg" data-select2-id="9895">Michael Airlines (MJG
                                                            | DF)</option>
                                                        <option value="kgo" data-select2-id="9896">Korongo Airlines (KGO
                                                            | ZC)</option>
                                                        <option value="ids" data-select2-id="9897">Indonesia Sky (IDS |
                                                            I5)</option>
                                                        <option value="666" data-select2-id="9898">Aws Express (666 |
                                                            B0)</option>
                                                        <option value="sjs" data-select2-id="9899">Southjet (SJS | 76)
                                                        </option>
                                                        <option value="zcs" data-select2-id="9900">Southjet Connect (ZCS
                                                            | 77)</option>
                                                        <option value="xan" data-select2-id="9901">Southjet Cargo (XAN |
                                                            78)</option>
                                                        <option value="ibs" data-select2-id="9902">Iberia Express (IBS |
                                                            I2)</option>
                                                        <option value="4o" data-select2-id="9903">Interjet (ABC
                                                            Aerolineas) (4O)</option>
                                                        <option value="og" data-select2-id="9904">AirOnix (OG)</option>
                                                        <option value="ngb" data-select2-id="9905">Nordic Global
                                                            Airlines (NGB | NJ)</option>
                                                        <option value="sco" data-select2-id="9906">Scoot (SCO | TZ)
                                                        </option>
                                                        <option value="5k" data-select2-id="9907">Hi Fly (5K) (5K)
                                                        </option>
                                                        <option value="wh" data-select2-id="9908">China Northwest
                                                            Airlines (WH) (WH)</option>
                                                        <option value="zna" data-select2-id="9909">Zenith International
                                                            Airline (ZNA | ZN)</option>
                                                        <option value="oab" data-select2-id="9910">Orbit Airlines
                                                            Azerbaijan (OAB | O1)</option>
                                                        <option value="a6" data-select2-id="9911">Air Alps Aviation (A6)
                                                            (A6)</option>
                                                        <option value="fka" data-select2-id="9912">Flying Kangaroo
                                                            Airline (FKA)</option>
                                                        <option value="rsj" data-select2-id="9913">RusJet (RSJ)</option>
                                                        <option value="vjc" data-select2-id="9914">VietJet Air (VJC)
                                                        </option>
                                                        <option value="p4" data-select2-id="9915">Patriot Airways (P4)
                                                        </option>
                                                        <option value="rby" data-select2-id="9916">Vision Airlines (V2)
                                                            (RBY | V2)</option>
                                                        <option value="5q" data-select2-id="9917">BQB Lineas Aereas (5Q)
                                                        </option>
                                                        <option value="waj" data-select2-id="9918">AirAsia Japan (WAJ)
                                                        </option>
                                                        <option value="yel" data-select2-id="9919">Yellowtail (YEL | YE)
                                                        </option>
                                                        <option value="raw" data-select2-id="9920">Royal Airways (RAW |
                                                            KG)</option>
                                                        <option value="fhi" data-select2-id="9921">FlyHigh Airlines
                                                            Ireland (FH) (FHI | FH)</option>
                                                        <option value="xsr" data-select2-id="9922">Executive AirShare
                                                            (XSR)</option>
                                                        <option value="hbh" data-select2-id="9923">Hebei Airlines (HBH)
                                                        </option>
                                                        <option value="kbz" data-select2-id="9924">Air KBZ (KBZ)
                                                        </option>
                                                        <option value="2d" data-select2-id="9925">Aero VIP (2D) (2D)
                                                        </option>
                                                        <option value="yh" data-select2-id="9926">Yangon Airways Ltd.
                                                            (YH)</option>
                                                        <option value="tja" data-select2-id="9927">T.J. Air (TJA | TJ)
                                                        </option>
                                                        <option value="sx" data-select2-id="9928">SkyWork Airlines (SX)
                                                        </option>
                                                        <option value="w2" data-select2-id="9929">Maastricht Airlines
                                                            (W2)</option>
                                                        <option value="24" data-select2-id="9930">Euro Jet (24)</option>
                                                        <option value="uat" data-select2-id="9931">Ukraine Atlantic
                                                            (UAT)</option>
                                                        <option value="nma" data-select2-id="9932">Nesma Airlines (NMA)
                                                        </option>
                                                        <option value="ehn" data-select2-id="9933">East Horizon (EHN)
                                                        </option>
                                                        <option value="mjp" data-select2-id="9934">Air Majoro (MJP)
                                                        </option>
                                                        <option value="rjd" data-select2-id="9935">Rotana Jet (RJD)
                                                        </option>
                                                        <option value="qer" data-select2-id="9936">SOCHI AIR CHATER (QER
                                                            | Q3)</option>
                                                        <option value="j7" data-select2-id="9937">Denim Air (J7)
                                                        </option>
                                                        <option value="mxd" data-select2-id="9938">Malindo Air (MXD |
                                                            OD)</option>
                                                        <option value="hrm" data-select2-id="9939">Hermes Airlines (HRM)
                                                        </option>
                                                        <option value="z9" data-select2-id="9940">Flightlink Tanzania
                                                            (Z9)</option>
                                                        <option value="i8" data-select2-id="9941">IzAvia (I8)</option>
                                                        <option value="КТК" data-select2-id="9942">Катэкавиа (КТК)
                                                        </option>
                                                        <option value="pkv" data-select2-id="9943">Псковавиа (PKV)
                                                        </option>
                                                        <option value="m1f" data-select2-id="9944">Maryland Air (M1F |
                                                            M1)</option>
                                                        <option value="7i" data-select2-id="9945">Insel Air (7I/INC)
                                                            (Priv) (7I)</option>
                                                        <option value="vvc" data-select2-id="9946">VivaColombia (VVC |
                                                            5Z)</option>
                                                        <option value="fcm" data-select2-id="9947">Flybe Finland Oy
                                                            (FCM)</option>
                                                        <option value="bgy" data-select2-id="9948">Bingo Airways (BGY)
                                                        </option>
                                                        <option value="bbg" data-select2-id="9949">Bluebird Airways (BZ)
                                                            (BBG)</option>
                                                        <option value="iwa" data-select2-id="9950">Apache Air (IWA | ZM)
                                                        </option>
                                                        <option value="m2" data-select2-id="9951">MHS Aviation GmbH (M2)
                                                        </option>
                                                        <option value="jto" data-select2-id="9952">Jettor Airlines (JTO
                                                            | NR)</option>
                                                        <option value="vqi" data-select2-id="9953">Flyme (VP) (VQI)
                                                        </option>
                                                        <option value="sl" data-select2-id="9954">Thai Lion Air (SL)
                                                        </option>
                                                        <option value="gmr" data-select2-id="9955">Golden Myanmar
                                                            Airlines (GMR)</option>
                                                        <option value="cnf" data-select2-id="9956">Canaryfly (CNF)
                                                        </option>
                                                        <option value="ksz" data-select2-id="9957">Sunrise Airways (KSZ)
                                                        </option>
                                                        <option value="ncr" data-select2-id="9958">National Air Cargo
                                                            (NCR | N8)</option>
                                                        <option value="eav" data-select2-id="9959">Eastern Atlantic
                                                            Virtual Airlines (EAV | 13)</option>
                                                        <option value="qg" data-select2-id="9960">Citilink Indonesia
                                                            (QG)</option>
                                                        <option value="ttz" data-select2-id="9961">Transair (TTZ)
                                                        </option>
                                                        <option value="evc" data-select2-id="9962">Comfort Express
                                                            Virtual Charters Albany (EVC)</option>
                                                        <option value="ceo" data-select2-id="9963">Comfort Express
                                                            Virtual Charters (CEO)</option>
                                                        <option value="fyj" data-select2-id="9964">FLYJET (FYJ)</option>
                                                        <option value="sbd" data-select2-id="9965">Snowbird Airlines
                                                            (SBD | S8)</option>
                                                        <option value="kry" data-select2-id="9966">Russkie Krylya (KRY)
                                                        </option>
                                                        <option value="khk" data-select2-id="9967">Kharkiv Airlines (KHK
                                                            | KH)</option>
                                                        <option value="xau" data-select2-id="9968">XAIR USA (XAU | XA)
                                                        </option>
                                                        <option value="lb" data-select2-id="9969">Air Costa (LB)
                                                        </option>
                                                        <option value="rmk" data-select2-id="9970">Simrik Airlines (RMK)
                                                        </option>
                                                        <option value="xpt" data-select2-id="9971">XPTO (XPT | XP)
                                                        </option>
                                                        <option value="dme" data-select2-id="9972">Royal Flight (DME)
                                                        </option>
                                                        <option value="egh" data-select2-id="9973">BBN-Airways (EGH)
                                                        </option>
                                                        <option value="tks" data-select2-id="9974">Tomsk-Avia (TKS)
                                                        </option>
                                                        <option value="3w" data-select2-id="9975">Malawian Airlines (3W)
                                                        </option>
                                                        <option value="nyt" data-select2-id="9976">Yeti Airlines (NYT)
                                                        </option>
                                                        <option value="..." data-select2-id="9977">Avilu (... | ..)
                                                        </option>
                                                        <option value="asl" data-select2-id="9978">Air Serbia (ASL | JU)
                                                        </option>
                                                        <option value="kcu" data-select2-id="9979">Skyline Ulasim
                                                            Ticaret A.S. (KCU)</option>
                                                        <option value="ltu" data-select2-id="9980">Air Lituanica (LTU |
                                                            LT)</option>
                                                        <option value="eny" data-select2-id="9981">Envoy Air (ENY)
                                                        </option>
                                                        <option value="ccb" data-select2-id="9982">CARICOM AIRWAYS
                                                            (BARBADOS) INC. (CCB)</option>
                                                        <option value="rab" data-select2-id="9983">Rainbow Air (RAI)
                                                            (RAB | RN)</option>
                                                        <option value="ray" data-select2-id="9984">Rainbow Air Canada
                                                            (RAY | RY)</option>
                                                        <option value="rpo" data-select2-id="9985">Rainbow Air Polynesia
                                                            (RPO | RX)</option>
                                                        <option value="rue" data-select2-id="9986">Rainbow Air Euro (RUE
                                                            | RU)</option>
                                                        <option value="rny" data-select2-id="9987">Rainbow Air US (RNY |
                                                            RM)</option>
                                                        <option value="tns" data-select2-id="9988">Transilvania (TNS)
                                                        </option>
                                                        <option value="dob" data-select2-id="9989">Dobrolet (DOB | QD)
                                                        </option>
                                                        <option value="sal" data-select2-id="9990">Spike Airlines (SAL |
                                                            S0)</option>
                                                        <option value="gca" data-select2-id="9991">Grand Cru Airlines
                                                            (GCA)</option>
                                                        <option value="rlx" data-select2-id="9992">Go2Sky (RLX)</option>
                                                        <option value="al1" data-select2-id="9993">All Argentina (AL1 |
                                                            L1)</option>
                                                        <option value="al2" data-select2-id="9994">All America (AL2 |
                                                            A2)</option>
                                                        <option value="al3" data-select2-id="9995">All Asia (AL3 | L9)
                                                        </option>
                                                        <option value="99f" data-select2-id="9996">All Africa (99F | 9A)
                                                        </option>
                                                        <option value="j88" data-select2-id="9997">Regionalia México
                                                            (J88 | N4)</option>
                                                        <option value="n99" data-select2-id="9998">All Europe (N99 | N9)
                                                        </option>
                                                        <option value="n77" data-select2-id="9999">All Spain (N77 | N7)
                                                        </option>
                                                        <option value="n78" data-select2-id="10000">Regional Air Iceland
                                                            (N78 | 9N)</option>
                                                        <option value="k88" data-select2-id="10001">Voestar (K88 | 8K)
                                                        </option>
                                                        <option value="7kk" data-select2-id="10002">All Colombia (7KK |
                                                            7O)</option>
                                                        <option value="2k2" data-select2-id="10003">Regionalia Uruguay
                                                            (2K2 | 2X)</option>
                                                        <option value="9xx" data-select2-id="10004">Regionalia Venezuela
                                                            (9XX | 9X)</option>
                                                        <option value="cr1" data-select2-id="10005">Regionalia Chile
                                                            (CR1 | 9J)</option>
                                                        <option value="6cc" data-select2-id="10006">Vuela Cuba (6CC |
                                                            6C)</option>
                                                        <option value="8k8" data-select2-id="10007">All Australia (8K8 |
                                                            88)</option>
                                                        <option value="rww" data-select2-id="10008">Fly Europa (RWW |
                                                            ER)</option>
                                                        <option value="fpt" data-select2-id="10009">FlyPortugal (FPT |
                                                            PO)</option>
                                                        <option value="sjo" data-select2-id="10010">Spring Airlines
                                                            Japan (SJO | IJ)</option>
                                                        <option value="dwa" data-select2-id="10011">Dense Airways (DWA |
                                                            KP)</option>
                                                        <option value="dc2" data-select2-id="10012">Dense Connection
                                                            (DC2 | KZ)</option>
                                                        <option value="vi4" data-select2-id="10013">Vuola Italia (VI4 |
                                                            4S)</option>
                                                        <option value="rsp" data-select2-id="10014">Jet Suite (RSP)
                                                        </option>
                                                        <option value="fjm" data-select2-id="10015">Fly Jamaica Airways
                                                            (FJM)</option>
                                                        <option value="1x" data-select2-id="10016">Island Express Air
                                                            (1X)</option>
                                                        <option value="z9h" data-select2-id="10017">All Argentina
                                                            Express (Z9H | Z0)</option>
                                                        <option value="we" data-select2-id="10018">Thai Smile Airways
                                                            (WE)</option>
                                                        <option value="i4" data-select2-id="10019">International AirLink
                                                            (I4)</option>
                                                        <option value="rt" data-select2-id="10020">Real Tonga (RT)
                                                        </option>
                                                        <option value="m7a" data-select2-id="10021">All America AR (M7A
                                                            | 2R)</option>
                                                        <option value="r1r" data-select2-id="10022">All America CL (R1R
                                                            | 1R)</option>
                                                        <option value="sae" data-select2-id="10023">SOCHI AIR EXPRESS
                                                            (SAE | Q4)</option>
                                                        <option value="a9b" data-select2-id="10024">All America BR (A9B
                                                            | 1Y)</option>
                                                        <option value="vc9" data-select2-id="10025">Volotea Costa Rica
                                                            (VC9 | 9V)</option>
                                                        <option value="otj" data-select2-id="10026">Fly Romania (OTJ |
                                                            X5)</option>
                                                        <option value="e2" data-select2-id="10027">Eagle Atlantic
                                                            Airlines (E2)</option>
                                                        <option value="fzw" data-select2-id="10028">Fly Africa Zimbabwe
                                                            (FZW)</option>
                                                        <option value="sdi" data-select2-id="10029">San Dima Air (SDI)
                                                        </option>
                                                        <option value="7zc" data-select2-id="10030">All America CO (7ZC
                                                            | 0Y)</option>
                                                        <option value="0mm" data-select2-id="10031">All America MX (0MM
                                                            | 0M)</option>
                                                        <option value="fox" data-select2-id="10032">FOX Linhas Aereas
                                                            (FOX | FX)</option>
                                                        <option value="qp" data-select2-id="10033">Air Kenya (Priv) (QP)
                                                        </option>
                                                        <option value="czv" data-select2-id="10034">Via Conectia
                                                            Airlines (CZV | 6V)</option>
                                                        <option value="hbr" data-select2-id="10035">Hebradran Air
                                                            Services (HBR)</option>
                                                        <option value="pbd" data-select2-id="10036">Pobeda (PBD)
                                                        </option>
                                                        <option value="gta" data-select2-id="10037">City Airways (GTA |
                                                            E8)</option>
                                                        <option value="nlh" data-select2-id="10038">Norwegian Long Haul
                                                            AS (NLH | DU)</option>
                                                        <option value="710" data-select2-id="10039">BA101 (710)</option>
                                                        <option value="tnu" data-select2-id="10040">TransNusa Air (TNU |
                                                            M8)</option>
                                                        <option value="t9p" data-select2-id="10041">Tomp Airlines (T9P |
                                                            ZT)</option>
                                                        <option value="fza" data-select2-id="10042">Fuzhou Airlines
                                                            (FZA)</option>
                                                        <option value="swm" data-select2-id="10043">Sky Angkor Airlines
                                                            (ZA) (SWM)</option>
                                                        <option value="j1" data-select2-id="10044">OneJet (J1)</option>
                                                        <option value="ga0" data-select2-id="10045">Global Airlines (GA0
                                                            | 0G)</option>
                                                        <option value="myp" data-select2-id="10046">Mann Yadanarpon
                                                            Airlines (MYP)</option>
                                                        <option value="vti" data-select2-id="10047">Air Vistara (VTI |
                                                            UK)</option>
                                                        <option value="rgg" data-select2-id="10048">TransRussiaAirlines
                                                            (RGG | 1E)</option>
                                                        <option value="d2" data-select2-id="10049">Severstal Air Company
                                                            (D2)</option>
                                                        <option value="rxr" data-select2-id="10050">REXAIR VIRTUEL (RXR
                                                            | RR)</option>
                                                        <option value="wen" data-select2-id="10051">WestJet Encore (WEN
                                                            | WR)</option>
                                                        <option value="ppl" data-select2-id="10052">Air Pegasus (PPL |
                                                            OP)</option>
                                                        <option value="ine" data-select2-id="10053">International Europe
                                                            (INE | 9I)</option>
                                                        <option value="skv" data-select2-id="10054">Sky Regional
                                                            Airlines (SKV)</option>
                                                        <option value="vax" data-select2-id="10055">V Air (VAX | ZV)
                                                        </option>
                                                        <option value="clj" data-select2-id="10056">Cello Aviation (CLJ)
                                                        </option>
                                                        <option value="pya" data-select2-id="10057">Pouya Air (PYA)
                                                        </option>
                                                        <option value="btq" data-select2-id="10058">Boutique Air (Priv)
                                                            (BTQ | 4B)</option>
                                                        <option value="feg" data-select2-id="10059">FlyEgypt (FEG)
                                                        </option>
                                                        <option value="voe" data-select2-id="10060">VOLOTEA Airways (VOE
                                                            | V7)</option>
                                                        <option value="iir" data-select2-id="10061">INAVIA Internacional
                                                            (IIR | Z5)</option>
                                                        <option value="lty" data-select2-id="10062">Liberty Airways (LTY
                                                            | LE)</option>
                                                        <option value="АЯ" data-select2-id="10063">Аэросервис (АЯ)
                                                        </option>
                                                        <option value="iam" data-select2-id="10064">Aeronautica Militare
                                                            (IAM)</option>
                                                        <option value="bsx" data-select2-id="10065">Bassaka Airlines
                                                            (BSX | 5B)</option>
                                                        <option value="jjp" data-select2-id="10066">Jetstar Japan (JJP)
                                                        </option>
                                                        <option value="q7" data-select2-id="10067">SkyBahamas Airlines
                                                            (Q7)</option>
                                                        <option value="uw" data-select2-id="10068">UVT Aero (UW)
                                                        </option>
                                                        <option value="dak" data-select2-id="10069">First Flying (DAK)
                                                        </option>
                                                        <option value="3m" data-select2-id="10070">Silver Airways (3M)
                                                            (3M)</option>
                                                        <option value="ujx" data-select2-id="10071">AtlasGlobal Ukraine
                                                            (UJX)</option>
                                                        <option value="bov" data-select2-id="10072">Boliviana De
                                                            Aviacion (OB) (BOV)</option>
                                                        <option value="ubg" data-select2-id="10073">US-Bangla Airlines
                                                            (UBG)</option>
                                                        <option value="ibk" data-select2-id="10074">Norwegian Air
                                                            International (D8) (IBK)</option>
                                                        <option value="i3" data-select2-id="10075">ATA Airlines (Iran)
                                                            (I3)</option>
                                                        <option value="via" data-select2-id="10076">VIA Líneas Aéreas
                                                            (VIA | V1)</option>
                                                        <option value="gxg" data-select2-id="10077">GermanXL (GXG | GX)
                                                        </option>
                                                        <option value="kya" data-select2-id="10078">Alghanim (KYA)
                                                        </option>
                                                        <option value="idx" data-select2-id="10079">Indonesa Air Aisa X
                                                            (IDX)</option>
                                                        <option value="frf" data-select2-id="10080">Fly France (FRF |
                                                            FF)</option>
                                                        <option value="enz" data-select2-id="10081">Jota Aviation (ENZ)
                                                        </option>
                                                        <option value="eu9" data-select2-id="10082">Europe Jet (EU9 |
                                                            EX)</option>
                                                        <option value="fcb" data-select2-id="10083">COBALT (FCB)
                                                        </option>
                                                        <option value="ltd" data-select2-id="10084">Southern Airways
                                                            Express (LTD)</option>
                                                        <option value="org" data-select2-id="10085">Orenburzhie (ORG)
                                                        </option>
                                                        <option value="wss" data-select2-id="10086">World Scale Airlines
                                                            (WSS | W3)</option>
                                                        <option value="ssa" data-select2-id="10087">All America US (SSA
                                                            | AG)</option>
                                                        <option value="uay" data-select2-id="10088">University Of
                                                            Birmingham Air Squadron (RAF) (UAY)</option>
                                                        <option value="csx" data-select2-id="10089">Choice Airways (CSX)
                                                        </option>
                                                        <option value="aru" data-select2-id="10090">Aruba Airlines (ARU)
                                                        </option>
                                                        <option value="bg1" data-select2-id="10091">BudgetAir (BG1 | 1K)
                                                        </option>
                                                        <option value="dya" data-select2-id="10092">Dynamic Airways
                                                            (DYA)</option>
                                                        <option value="fi5" data-select2-id="10093">Fly One (FI5 | F5)
                                                        </option>
                                                        <option value="ee" data-select2-id="10094">Nordica (EE)</option>
                                                        <option value="tez" data-select2-id="10095">Tez Jet Airlines
                                                            (TEZ)</option>
                                                        <option value="kuh" data-select2-id="10096">Kush Air (KUH)
                                                        </option>
                                                        <option value="sry" data-select2-id="10097">ViaAir (SRY)
                                                        </option>
                                                        <option value="pyb" data-select2-id="10098">All America BOPY
                                                            (PYB | 0P)</option>
                                                        <option value="tvj" data-select2-id="10099">Thai Vietjet Air
                                                            (TVJ)</option>
                                                        <option value="cbg" data-select2-id="10100">GX Airlines (CBG)
                                                        </option>
                                                        <option value="jg" data-select2-id="10101">Jetgo Australia (JG)
                                                        </option>
                                                        <option value="2s" data-select2-id="10102">Air Carnival (2S)
                                                        </option>
                                                        <option value="sjm" data-select2-id="10103">Svyaz Rossiya (SJM |
                                                            7R)</option>
                                                        <option value="nos" data-select2-id="10104">Neos (NOS | NO)
                                                        </option>
                                                        <option value="wsw" data-select2-id="10105">Swoop (WSW | SO)
                                                        </option>
                                                        <option value="iwy" data-select2-id="10106">InterCaribbean
                                                            Airways (IWY | JY)</option>
                                                    </select>
                                                    <input class="input-airline-number form-control" type="text"
                                                        value="" placeholder="Enter Airline Name"
                                                        name="other_arrival_airline_name"
                                                        id="other_arrival_airline_name" style="display: none;"
                                                        required="">
                                                </div>
                                                <div
                                                    class="arrival_airline_flight_num right-field-flt select-airline-number-div">
                                                    <select class="select-airline-number form-control select2">
                                                        <option disabled="" selected="" value="" data-select2-id="8845">
                                                            Select Airline/Flight No.</option>
                                                    </select>
                                                    <input class="input-airline-number form-control" type="text"
                                                        value="" placeholder="Enter Flight #"
                                                        name="other_arrival_airline_flight_num"
                                                        id="other_arrival_airline_flight_num" style="display: none;"
                                                        required="">
                                                </div>
                                            </div>
                                            <div class="arrival_airline_flight_not_listed_box">
                                                <input class="input-select-airline-number checkbox-input"
                                                    name="arrival_airline_flight_not_listed_chkbox" type="checkbox"
                                                    value="1" id="arrival_airline_flight_not_listed_chkbox"
                                                    style="cursor: pointer;" />
                                                <label class="input-select-airline-number"
                                                    for="arrival_airline_flight_not_listed_chkbox"
                                                    style="cursor: pointer;"
                                                    id="arrival_airline_flight_not_listed_chkbox_label">Arrival Airline
                                                    or Flight Number not listed?</label>
                                            </div>
                                        </div>
                                        <div id="arrival_date">
                                            <span>Arrival Date (MBJ)</span>
                                            <div class="d-flex flex-wrap arrival_row_col">
                                                <div class="arrival_one_col left-field-auto">
                                                    <input class="form-control arrival_info_main" type="number"
                                                        value="2021" min="2021" step="1" max="2099" required="" />
                                                    <span class="arrival-date-format-text">Year</span>
                                                </div>
                                                <div class="arrival_two_col mid-field-auto">
                                                    <input class="form-control arrival_info_main" type="number"
                                                        value="7" min="1" step="1" max="12" required="" />
                                                    <span class="arrival-date-format-text">Month</span>
                                                </div>
                                                <div class="arrival_three_col right-field-auto">
                                                    <input class="form-control arrival_info_main" type="number"
                                                        value="15" min="1" step="1" max="30" required="" />
                                                    <span class="arrival-date-format-text">Day</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="arrival_time">
                                            <span>Arrival Time (MBJ)</span>
                                            <div class="d-flex flex-wrap arrival_row_col">
                                                <div class="arrival_one_col left-field-auto">
                                                    <input class="form-control arrival_info_main" type="number"
                                                        value="12" min="1" step="1" max="12" required="" />
                                                    <span class="arrival-time-format-text">Hour</span>
                                                </div>
                                                <div class="arrival_two_col left-field-auto">
                                                    <input class="form-control arrival_info_main" type="number"
                                                        value="0" min="0" step="1" max="59" required="" />
                                                    <span class="arrival-time-format-text">Min</span>
                                                </div>
                                                <div class="arrival_three_col left-field-auto">
                                                    <select class="form-control arrival_info_main" required="">
                                                        <option value="am">AM</option>
                                                        <option value="pm">PM</option>
                                                    </select>
                                                    <span class="arrival-time-format-text">AM/PM</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row-accordion">
                                <button class="toggle-form-accordion collapsed" type="button" data-toggle="collapse"
                                    data-target="#depart_info_section" aria-expanded="false"
                                    aria-controls="depart_info_section">Departure Flight Information (MBJ)</button>
                                <div class="collapse" id="depart_info_section" data-parent="#accordion-form">
                                    <div class="accordion-form-inner">
                                        <div class="arrival_airline_info">
                                            <span class="label-span">Arrival Airline/Flight Details</span>
                                            <div class="d-flex flex-wrap row_field_flt">
                                                <div class="arrival_airline left-field-flt">
                                                    <select class="form-control select2">
                                                            <option disabled="" selected="" value="" data-select2-id="8843">
                                                                Select Airline/Flight No.</option>                                                            
                                                    </select>
                                                    <input class="input-airline-number form-control" type="text"
                                                        value="" placeholder="Enter Airline Name"
                                                        name="other_arrival_airline_name"
                                                        id="other_arrival_airline_name" style="display: none;"
                                                        required="">
                                                </div>
                                                <div class="arrival_airline_flight_num right-field-flt">
                                                    <select class="form-control select2">
                                                        <option disabled="" selected="" value="" data-select2-id="8845">
                                                            Select Airline/Flight No.</option>
                                                    </select>
                                                    <input class="input-airline-number form-control" type="text"
                                                        value="" placeholder="Enter Flight #"
                                                        name="other_arrival_airline_flight_num"
                                                        id="other_arrival_airline_flight_num" style="display: none;"
                                                        required="">
                                                </div>
                                            </div>
                                            <div class="arrival_airline_flight_not_listed_box">
                                                <input class="checkbox-input"
                                                    name="depart_airline_flight_not_listed_chkbox" type="checkbox"
                                                    value="1" id="depart_airline_flight_not_listed_chkbox"
                                                    style="cursor: pointer;" />
                                                <label for="depart_airline_flight_not_listed_chkbox"
                                                    style="cursor: pointer;"
                                                    id="arrival_airline_flight_not_listed_chkbox_label">Arrival Airline
                                                    or Flight Number not listed?</label>
                                            </div>
                                        </div>
                                        <div id="arrival_date">
                                            <span>Arrival Date (MBJ)</span>
                                            <div class="d-flex flex-wrap arrival_row_col">
                                                <div class="arrival_one_col left-field-auto">
                                                    <input class="form-control arrival_info_main" type="number"
                                                        value="2021" min="2021" step="1" max="2099" required="" />
                                                    <span class="arrival-date-format-text">Year</span>
                                                </div>
                                                <div class="arrival_two_col mid-field-auto">
                                                    <input class="form-control arrival_info_main" type="number"
                                                        value="7" min="1" step="1" max="12" required="" />
                                                    <span class="arrival-date-format-text">Month</span>
                                                </div>
                                                <div class="arrival_three_col right-field-auto">
                                                    <input class="form-control arrival_info_main" type="number"
                                                        value="15" min="1" step="1" max="30" required="" />
                                                    <span class="arrival-date-format-text">Day</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="arrival_time">
                                            <span>Arrival Time (MBJ)</span>
                                            <div class="d-flex flex-wrap arrival_row_col">
                                                <div class="arrival_one_col left-field-auto">
                                                    <input class="form-control arrival_info_main" type="number"
                                                        value="12" min="1" step="1" max="12" required="" />
                                                    <span class="arrival-time-format-text">Hour</span>
                                                </div>
                                                <div class="arrival_two_col left-field-auto">
                                                    <input class="form-control arrival_info_main" type="number"
                                                        value="0" min="0" step="1" max="59" required="" />
                                                    <span class="arrival-time-format-text">Min</span>
                                                </div>
                                                <div class="arrival_three_col left-field-auto">
                                                    <select class="form-control arrival_info_main" required="">
                                                        <option value="am">AM</option>
                                                        <option value="pm">PM</option>
                                                    </select>
                                                    <span class="arrival-time-format-text">AM/PM</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <div class="form-row-block">
                            <span class="label-span">Additional Transfer Information</span>
                            <textarea class="textarea-box" rows="4" maxlength="500"
                                id="adtl_pickup_info_input"></textarea>
                        </div>
                        <div class="tour_total_pricing">
                            <h4 class="price_title">Transfer Pricing</h4>
                            <h4 class="price">$<span id="transfer_price">0.00</span></h4>
                        </div>
                        <div class="submit-button-cover"><button type="submit"
                                class="form-tour-booking-button single_add_to_cart_button button disabled" style="" disabled>Book
                                now</button></div>
                        </form>
                    </div>
                </div>
                <div class="right-airport-transfers">
                    <div class="busimg-block">
                        <img src="{{ asset('assets/web/images/bus-img.png') }}" />
                    </div>
                    <div class="social-share-cover">
                        <div class="social-share-title">Share with friends.</div>
                        <div class="d-flex flex-wrap justify-content-center social-share-links">
                            <div class="share-link-div"><a href="#" class="share-link twitter-share"><i
                                        class="fab fa-twitter" aria-hidden="true"></i></a></div>
                            <div class="share-link-div"><a href="#" class="share-link facebook-share"><i
                                        class="fab fa-facebook" aria-hidden="true"></i></a></div>
                            <div class="share-link-div"><a href="#" class="share-link whatsapp-share"><i
                                        class="fab fa-whatsapp" aria-hidden="true"></i></a></div>
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
    // $( "#datepicker1" ).datepicker({ minDate: 0});
    jQuery('#datepicker1').datepicker({  minDate:new Date()});

    function calculate_price(){
        var type = jQuery('#type').val();
        if(jQuery("#location").val() ===''){
            // alert('Please select an location');
            get_transfer_price();
            return;
        }
        var adult = jQuery('#adults').val();
        var child = jQuery('#child').val();
        var total_pax = Number(adult) + Number(child);
        if(total_pax > 10){
            alert('Cannot add more than 10 persons');
            var adult = jQuery('#adults').val(0);
            var child = jQuery('#child').val(0);
        }
        var trip_type = jQuery('#trip_type').val();
        if(type==="shared"){
            var price = jQuery('#pax_price').val();
            if(price === ''){
                // alert('price is null');
                get_transfer_price();
            }
            if(trip_type === "round-trip"){
                price = price * 2;
            }
            // console.log('total pax '+total_pax);
            // console.log('pax price '+price);
            var total_price = total_pax * price;
            if(total_price > 0){
                jQuery('.single_add_to_cart_button').removeClass('disabled');
                jQuery('.single_add_to_cart_button').removeAttr('disabled');;
            }
            jQuery('#transfer_price').html(total_price+'.00');
        }
    }

    
    // jQuery(document).ready(function() {
        // jQuery("#location").change(function () {
        function get_transfer_price() {
            // var location_id = this.value;
            var location_id = jQuery("#location").val();
            var type = jQuery('#type').val();
            jQuery.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                url: "{{ route('get_airTransferPrice') }}",
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "location_id": location_id,
                    "type": type
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.success === true){
                        if(type === "shared") {
                            // console.log(data.option.price_pax);
                            jQuery('#pax_price').val(data.option.price_pax);
                            calculate_price();
                            return;
                        } else {
                            return;
                        }
                    } else {
                        return;
                    }
                }
            });
        // });
        }
    // });

</script>
@endsection