<template>
    <div class="guest-invi-navbar-cont">
        <div class="container-lg px-0">
            <div id="nav-slider" class="splide">
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
                                    <img src="/assets/hosthome/home.svg" alt="" />
                                </span>
                                Home
                            </a>
                        </li>
                        <li class="splide__slide">
                            <a
                                :href="route('hostinvitations.index')"
                                :class="{ active: active == 'invitation' }"
                                ref="invitation"
                            >
                                <span v-if="screenWidth < 768">
                                    <img src="/assets/hosthome/invitation.svg" alt="" />
                                </span>
                                Invitation
                            </a>
                        </li>
                        <li class="splide__slide">
                            <a
                                :href="route('invitedguests.custom', invi?.slug ?? '')"
                                :class="{ active: active == 'guests' }"
                                ref="guests"
                            >
                                <span v-if="screenWidth < 768">
                                    <img src="/assets/invitation/guests.svg" alt="" />
                                </span>
                                Guest Book
                            </a>
                        </li>
                        <li class="splide__slide">
                            <a
                                :href="route('gallery.index')"
                                :class="{ active: active == 'gallery' }"
                                ref="gallery"
                            >
                                <span v-if="screenWidth < 768">
                                    <img src="/assets/hosthome/gallery.svg" alt="" />
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
                                    <img src="/assets/hosthome/reports.svg" alt="" />
                                </span>
                                Reports
                            </a>
                        </li>
                    </ul>
                </div>
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
            screenWidth: window.innerWidth,
            cont: null,
        };
    },
    methods: {
        setSplider() {
            this.$nextTick(() => {
                const element = document.getElementById('nav-slider');
                if (element) {
                    this.cont = new Splide("#nav-slider", {
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
                    this.cont.mount();
                }
            });
        },
        setinvi(data) {
            this.invi = data;
        },
        setWidth() {
            this.screenWidth = window.innerWidth;
        },
    },
    created() {
        this.$root.$on("updateinvi", this.setinvi);
    },
    mounted() {
        this.setWidth();
        this.setSplider();

        if (this.$refs[this.link]) {
            this.$refs[this.link].scrollIntoView({
                behavior: "smooth",
                block: "start",
                inline: "nearest",
            });
        }

        window.addEventListener("resize", () => {
            this.setWidth();
            if (this.cont) {
                this.cont.destroy(true); // Destroy previous instance
                this.setSplider();       // Re-initialize Splide
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

.guest-invi-navbar a {
    font-family: "Poppins";
    font-weight: 400;
    font-size: 15px;
    line-height: 22px;
    text-align: center;
    color: #9a9a9a;
    padding: 8px 90px;
    cursor: pointer;
    white-space: nowrap;
    text-decoration: none;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.guest-invi-navbar a > span {
    width: 46px;
    height: 46px;
    margin-bottom: 25px;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    background: rgba(255, 255, 255, 0.1);
}

.guest-invi-navbar .active {
    background: #ffffff;
    border-radius: 23px;
    color: #461952;
    font-weight: 700;
}

.guest-invi-navbar > li {
    border: none !important;
}

/* Mobile Styles */
@media screen and (max-width: 768px) {
    .guest-invi-navbar-cont {
        top: 61px;
    }

    .guest-invi-navbar {
        width: 100%;
        max-width: 100% !important;
        border-radius: 0 !important;
    }

    .guest-invi-navbar a {
        padding: 8px 20px; /* Reduced padding from 90px to 20px */
        font-size: 14px;
    }

    .guest-invi-navbar a > span {
        width: 36px; /* Reduced from 46px */
        height: 36px; /* Reduced from 46px */
        margin-bottom: 10px; /* Reduced from 25px */
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

    .splide__track {
        border-radius: 0 !important;
    }
    
    /* Add compact spacing for splide slides */
    .splide__slide {
        padding: 0 5px !important;
    }
}

/* Smaller screen fix */
@media screen and (max-width: 576px) {
    .guest-invi-navbar-cont {
        top: 56px;
    }
    
    .guest-invi-navbar a {
        padding: 8px 10px; /* Further reduced padding for very small screens */
        font-size: 12px;
    }
    
    .guest-invi-navbar a > span {
        width: 30px;
        height: 30px;
        margin-bottom: 8px;
    }
}

/* Ensure PC styles don't get overridden */
@media screen and (min-width: 769px) {
    .guest-invi-navbar {
        border-radius: 27px;
    }

    .guest-invi-navbar .active {
        background: #ffffff;
        color: #461952;
        border-radius: 23px;
    }

    .guest-invi-navbar .active > span {
        background-color: rgba(255, 255, 255, 0.1);
    }
}
</style>

