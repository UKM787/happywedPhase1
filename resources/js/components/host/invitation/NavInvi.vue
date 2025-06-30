<template>
    <div>
        <div class="guest-invi-navbar-cont">
            <div class="container-lg">
                <!--<div id="nav-slider" class="splide">-->
                    <div
                        class="splide__track"
                        style="background: #461952; border-radius: 27px"
                    >
                        <ul class="splide__list guest-invi-navbar">
                            <li class="splide__slide">
                                <a
                                    :href="route('hostwelcome')"
                                    :class="{ active: active == 'home' }"
                                    ref="home"
                                >
                                    <span v-if="screenWidth < 768">
                                        <img
                                            src="/assets/hosthome/home.svg"
                                            alt=""
                                        />
                                    </span>
                                    Home
                                </a>
                            </li>
                            <li class="splide__slide" style="padding-inline-start: 20px;">
                                <a
                                    :href="route('hostinvitations.index')"
                                    :class="{ active: active == 'invitation' }"
                                    ref="invitation"
                                >
                                    <span v-if="screenWidth < 768">
                                        <img
                                            src="/assets/hosthome/invitation.svg"
                                            alt=""
                                        />
                                    </span>
                                    Invitation
                                </a>
                            </li>
                            <li class="splide__slide" style="padding-inline-start: 20px;">
                                <a
                                    :href="
                                        route(
                                            'invitedguests.custom',
                                            invi?.slug ?? ''
                                        )
                                    "
                                    :class="{ active: active == 'guests' }"
                                    ref="guests"
                                >
                                    <span v-if="screenWidth < 768">
                                        <img
                                            src="/assets/invitation/guests.svg"
                                            alt=""
                                        />
                                    </span>
                                    Guest Book
                                </a>
                            </li>
                            <!-- <li class="splide__slide">
                                <a
                                    :href="route('hostmembers.index')"
                                    :class="{ active: active == 'members' }"
                                    ref="members"
                                >
                                    <span v-if="screenWidth < 768">
                                        <img
                                            src="/assets/hosthome/members.svg"
                                            alt=""
                                        />
                                    </span>
                                    Members
                                </a>
                            </li>
                            <li class="splide__slide">
                                <a
                                    :href="route('hosttasks.index')"
                                    :class="{ active: active == 'tasklist' }"
                                    ref="tasklist"
                                >
                                    <span v-if="screenWidth < 768">
                                        <img
                                            src="/assets/hosthome/tasklist.svg"
                                            alt=""
                                        />
                                    </span>
                                    Task Management
                                </a>
                            </li> -->
                            <!--<li class="splide__slide">
                                <a
                                    :href="route('hostlogistics.index')"
                                    :class="{ active: active == 'logistics' }"
                                    ref="logistics"
                                >
                                    <span v-if="screenWidth < 768">
                                        <img
                                            src="/assets/hosthome/logistics.svg"
                                            alt=""
                                        />
                                    </span>
                                    Logistics
                                </a>
                            </li>
                            <li class="splide__slide">
                                <a
                                    :href="route('hostaccommodation.index')"
                                    :class="{ active: active == 'accommodation' }"
                                    ref="accommodation"
                                >
                                    <span v-if="screenWidth < 768">
                                        <img
                                            src="/assets/hosthome/accommodation.svg"
                                            alt=""
                                        />
                                    </span>
                                    Accommodation
                                </a>
                            </li>-->
                            <li class="splide__slide" style="padding-inline-start: 60px;">
                                <a
                                    :href="route('gallery.index')"
                                    :class="{ active: active == 'gallery' }"
                                    ref="gallery"
                                >
                                    <span v-if="screenWidth < 768">
                                        <img
                                            src="/assets/hosthome/gallery.svg"
                                            alt=""
                                        />
                                    </span>
                                    Gallery
                                </a>
                            </li>
                            <li class="splide__slide">
                                <a
                                    :href="route('reports.index')"
                                    :class="{ active: active == 'reports' }"
                                    ref="reports"
                                >
                                    <span v-if="screenWidth < 768">
                                        <img
                                            src="/assets/hosthome/reports.svg"
                                            alt=""
                                        />
                                    </span>
                                    Reports
                                </a>
                            </li>
                            <!-- <a
                                    :href="route('subscribePage')"
                                    :class="{ active: active == 'subscribe' }"
                                    ref="subscribe"
                                >
                                    <span v-if="screenWidth < 768">
                                        <img src="/assets/hosthome/reports.svg" alt="" />
                                    </span>
                                    Subscribe
                                </a> -->
                            <!-- <a
                                    :href="route('subscribeReccuringPage')"
                                    :class="{ active: active == 'subscribeReccuring' }"
                                    ref="subscribeReccuring"
                                >
                                    <span v-if="screenWidth < 768">
                                        <img src="/assets/hosthome/reports.svg" alt="" />
                                    </span>
                                    Subscribe Reccuring
                                </a> -->
                        </ul>
                    </div>
                <!--</div>-->
            </div>
        </div>
        <div v-if="active != 'guests'" class="guest-invi-navbar-cont" style="top: unset; bottom: 0">
            <div
                class="guest-invi-navbar bottom-nav container-lg"
                style="border-radius: unset"
            >
                <a
                    :href="route('hostinvitation.custom', invi?.slug ?? '')"
                    :class="{ active: active == 'invitation' }"
                    ref="invitation"
                >
                    <span v-if="screenWidth < 768">
                        <img src="/assets/invitation/invitation.svg" alt="" />
                    </span>
                    Invitation Cover
                </a>
                <a
                    :href="route('hostsavedate.custom', invi?.slug ?? '')"
                    :class="{ active: active == 'savedate' }"
                    ref="savedate"
                >
                    <span v-if="screenWidth < 768">
                        <img src="/assets/invitation/savedate.svg" alt="" />
                    </span>
                    Save The Date
                </a>
                <a
                    :href="route('hostceremony.custom', invi?.slug ?? '')"
                    :class="{ active: active == 'ceramonies' }"
                    ref="ceramonies"
                >
                    <span v-if="screenWidth < 768">
                        <img src="/assets/invitation/ceramonies.svg" alt="" />
                    </span>
                    Ceremonies
                </a>
                <a
                    :href="route('hoststory.custom', invi?.slug ?? '')"
                    :class="{ active: active == 'ourstory' }"
                    ref="ourstory"
                >
                    <span v-if="screenWidth < 768">
                        <img src="/assets/invitation/ourstory.svg" alt="" />
                    </span>
                    Our Story
                </a>
                <a
                    :href="route('hostinvitationcontact.custom', invi?.slug ?? '')"
                    :class="{ active: active == 'helpline' }"
                    ref="helpline"
                >
                    <span v-if="screenWidth < 768">
                        <img src="/assets/invitation/helpline.svg" alt="" />
                    </span>
                    Help Line
                </a>
                <!-- <a
                    :href="route('invitedguests.custom', invi?.slug ?? '')"
                    :class="{ active: active == 'guests' }"
                    ref="guests"
                >
                    <span v-if="screenWidth < 768">
                        <img src="/assets/invitation/guests.svg" alt="" />
                    </span>
                    Guest Book
                </a> -->
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["link", "invitation"],
    data() {
        return {
            active: this.link,
            invi: this.invitation,
            screenWidth: window.screen.width,
            cont: null,
        };
    },
    methods: {
        setSplider() {
            let _this = this;
            this.$nextTick(function () {
                // Check if the element exists before initializing Splide
                const navSlider = document.getElementById('nav-slider');
                if (!navSlider) {
                    console.warn('Nav slider element not found');
                    return;
                }
                
                _this.cont = new Splide('#nav-slider', {
                    perMove: 3,
                    rewind: true,
                    pagination: false,
                    isNavigation: true,
                    arrows: true,
                    autoWidth: true,
                    breakpoints: {
                        567: {
                            arrows: false,
                            wheel: true,
                            direction: "ltr",
                            releaseWheel: false,
                        },
                    },
                });
                _this.cont.mount();
            });
        },
        setinvi(data) {
            console.log("ssss");
            this.invi = data;
        },
        setWidth() {
            this.screenWidth = window.screen.width;
        },
    },
    created() {
        this.$root.$on("updateinvi", this.setinvi);
    },
    mounted() {
        document.onreadystatechange = () => {
            if (document.readyState == "complete") {
                // Only call setSplider if we're on a page with the nav-slider element
                if (document.getElementById('nav-slider')) {
                    this.setSplider();
                    if(this.$root?.$children[2]?.$children[1]?.spliderEvent){
                        this.$root?.$children[2]?.$children[1]?.spliderEvent();
                    }
                }
            }
        };
        window.addEventListener("resize", this.setWidth);
        this.$nextTick(() => {
            if (this.$refs[this.link]) {
                this.$refs[this.link].scrollIntoView({
                    behavior: "smooth",
                    block: "start",
                    inline: "nearest",
                });
            }
        });
    },
};
</script>

<style scoped>
.guest-invi-navbar-cont {
    position: fixed;
    display: flex;
    justify-content: center;
    top: 91px;
    z-index: 9999999999;
    width: 100%;
}
.guest-invi-navbar {
    background: #461952;
    border-radius: 27px;
    padding: 8px 13px !important;
}
.bottom-nav {
    display: flex;
    justify-content: space-between;
    overflow-x: auto;
    -ms-overflow-style: none; 
    scrollbar-width: none; 
}
.bottom-nav::-webkit-scrollbar {
    display: none;
}
.guest-invi-navbar  a {
    font-family: "Poppins";
    font-style: normal;
    font-weight: 400;
    font-size: 15px;
    line-height: 22px;
    text-align: center;
    color: #9a9a9a;
    padding: 8px 80px;
    cursor: pointer;
    white-space: nowrap;
    text-decoration: none;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.guest-invi-navbar  a > span {
    width: 46px;
    height: 46px;
    margin-bottom: 25px;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    
}
.guest-invi-navbar  .active {
    background: #ffffff;
    border-radius: 23px;
    color: #461952;
    font-weight: 700;
}
.guest-invi-navbar > li {
    border: none !important;
}
/* Navbar css end */
@media screen and (max-width: 768px) {
    .guest-invi-navbar-cont {
        top: 63px;
    }
    .guest-invi-navbar {
        width: 100%;
        max-width: 100% !important;
        border-radius: 0 !important;
    }
    .guest-invi-navbar a {
        padding: 8px 15px; /* Reduced padding for mobile */
        font-size: 14px;
    }
    .guest-invi-navbar a > span {
        width: 36px; /* Reduced size */
        height: 36px; /* Reduced size */
        margin-bottom: 10px; /* Reduced margin */
    }
    .guest-invi-navbar .active {
        background: inherit;
        border-radius: 0;
        color: #ffffff;
        font-weight: 700;
    }
    .guest-invi-navbar .active > span {
        background-color: #ffffff;
    }
    /* Reduce spacing between slides */
    .splide__slide {
        padding: 0 5px !important;
    }
    /* Adjust bottom nav spacing */
    .bottom-nav a {
        padding: 8px 10px;
        font-size: 13px;
    }
}
@media screen and (max-width: 576px) {
    .guest-invi-navbar-cont {
        top: 56px;
    }
    .guest-invi-navbar a {
        padding: 8px 8px; /* Further reduced padding */
        font-size: 12px;
    }
    .guest-invi-navbar a > span {
        width: 30px;
        height: 30px;
        margin-bottom: 8px;
    }
    /* Make bottom nav more compact */
    .bottom-nav a {
        padding: 8px 5px;
        font-size: 11px;
    }
    /* Remove inline padding that's causing extra space */
    .splide__slide {
        padding-inline-start: 0 !important;
    }
}

.nav-invi {
    background: white;
    padding: 20px 0;
    margin-bottom: 20px;
}

.nav-invi-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.nav-invi-left {
    display: flex;
    align-items: center;
    gap: 20px;
}

.nav-invi-right {
    display: flex;
    align-items: center;
    gap: 20px;
}

.nav-invi-item {
    display: flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
    padding: 8px 16px;
    border-radius: 8px;
    transition: background-color 0.3s;
}

.nav-invi-item:hover {
    background-color: #f5f5f5;
}

.nav-invi-item.active {
    background-color: #f0f0f0;
    font-weight: 500;
}

.nav-invi-item img {
    width: 20px;
    height: 20px;
}

/* Responsive styles */
@media screen and (max-width: 1200px) {
    .nav-invi-container {
        padding: 0 15px;
    }
    
    .nav-invi-item {
        padding: 6px 12px;
        font-size: 14px;
    }
}

@media screen and (max-width: 992px) {
    .nav-invi {
        padding: 15px 0;
    }
    
    .nav-invi-container {
        flex-wrap: wrap;
        gap: 15px;
    }
    
    .nav-invi-left, .nav-invi-right {
        width: 100%;
        justify-content: center;
    }
    
    .nav-invi-item {
        padding: 6px 10px;
        font-size: 13px;
    }
}

@media screen and (max-width: 768px) {
    .nav-invi-container {
        flex-direction: column;
        gap: 10px;
    }
    
    .nav-invi-left, .nav-invi-right {
        width: 100%;
        justify-content: space-between;
        flex-wrap: wrap;
    }
    
    .nav-invi-item {
        width: calc(50% - 10px);
        justify-content: center;
        padding: 8px;
    }
}

@media screen and (max-width: 576px) {
    .nav-invi {
        padding: 10px 0;
    }
    
    .nav-invi-container {
        padding: 0 10px;
    }
    
    .nav-invi-item {
        width: 100%;
        padding: 10px;
        font-size: 14px;
    }
    
    .nav-invi-left, .nav-invi-right {
        flex-direction: column;
        gap: 5px;
    }
    
    .nav-invi-item img {
        width: 18px;
        height: 18px;
    }
}

/* Additional styles for better touch targets on mobile */
@media (hover: none) and (pointer: coarse) {
    .nav-invi-item {
        padding: 12px 16px;
        margin: 4px 0;
    }
    
    .nav-invi-item img {
        width: 24px;
        height: 24px;
    }
}

/* Dark mode support */
@media (prefers-color-scheme: dark) {
    .nav-invi {
        background: #1a1a1a;
    }
    
    .nav-invi-item {
        color: #ffffff;
    }
    
    .nav-invi-item:hover {
        background-color: #2a2a2a;
    }
    
    .nav-invi-item.active {
        background-color: #333333;
    }
}
</style>


