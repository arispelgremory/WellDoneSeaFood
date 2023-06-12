import {Button, Card, Col, Grid, Link, Modal, Row, Spacer, Text, useModal} from "@nextui-org/react";
import React, { useRef, useState } from "react";
import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { ScrollToPlugin } from "gsap/ScrollToPlugin";
import style from "../utilities/css/Home.module.css";

gsap.registerPlugin(ScrollToPlugin);

const HomeComponent = () => {
    const [currentSection, setCurrentSection] = useState(0);
    const containerRef = React.useRef<HTMLDivElement>(null);
    const sectionRefs = useRef<Array<HTMLDivElement | null>>([]).current;
    const [navigating, setNavigating] = useState(false);

    const sections = [`landing`, `new-arrivals`, `popular-items`, `MovieModal`];

    const scrollHandler = (event: React.WheelEvent<HTMLDivElement>) => {

        if(navigating) return;
        setNavigating(true);

        // Determine whether the scroll was up or down:
        const direction = event.deltaY > 0 ? 1 : -1;

        // Calculate the next section:
        let nextSection = currentSection + direction;
        if(nextSection < 0) nextSection = 0;
        else if(nextSection >=  sections.length - 1) nextSection = sections.length - 1;

        // Scroll to the next section:
        const container = containerRef.current;

        if(container) {
            let scrollHeight = container.offsetHeight * nextSection;
            gsap.to(container, {
                duration: 1,
                scrollTo: {
                    y: scrollHeight,
                    x: 0
                },
                ease: "power2.inOut",
                onComplete: () => setNavigating(false)
            });
        }

        // Update the current section:
        setCurrentSection(nextSection);
    }


    return (
        <div
            ref={containerRef}
            onWheel={scrollHandler}
            className={`max-h-screen max-w-screen overflow-y-scroll home-container`}
        >
            <HomeLanding  />
            <HomeNewArrivals />
            <HomePopularItems />
            <HomeMovieModal />
        </div>
    )
}


const HomeLanding = () => {
    return (
        <div className={`h-screen w-[98%] m-auto flex justify-evenly items-center`}>
            <div>
                <Text h1 size={72}>Get Your Fresh Seafood</Text>
                <Text h4>Experience the Market's Freshest Fish at Your Convenience</Text>
                <Spacer y={1.5} />
                <Button auto color="primary">Explore More</Button>
            </div>
            <div>
                <img src={"/assets/images/Home/landing.png"} alt={`Fishes`} />
            </div>
        </div>
    )
}

const HomeNewArrivals = () => {
    return (
        <div className={`h-screen w-[98%] m-auto flex flex-col justify-center`}>
            <Text h2>New Arrivals</Text>
            <Spacer y={1.5} />
            <Row gap={1}>
                <Col>
                    <HomeCards />
                </Col>
                <Col>
                    <HomeCards />
                </Col>
                <Col>
                    <HomeCards />
                </Col>
            </Row>
        </div>
    )
}

const HomePopularItems = () => {
    return (
        <div className={`h-screen w-[98%] m-auto flex flex-col justify-center`}>
            <Text h2 css={{"margin-bottom": 0}}>Popular Items</Text>
            <Text h4>The products that our customers loved</Text>
            <Spacer y={1.5} />
            <Grid.Container gap={1} justify={"center"}>
                <Grid xs={12} md={6} lg={4}>
                    <HomeCards />
                </Grid>
                <Grid xs={12} md={6} lg={4}>
                    <HomeCards />
                </Grid>
                <Grid xs={12} md={6} lg={4}>
                    <HomeCards />
                </Grid>
                <Grid xs={12} md={6} lg={4}>
                    <HomeCards />
                </Grid>
                <Grid xs={12} md={6} lg={4}>
                    <HomeCards />
                </Grid>
                <Grid xs={12} md={6} lg={4}>
                    <HomeCards />
                </Grid>
            </Grid.Container>
        </div>
    )
}

const HomeMovieModal = () => {
    const { visible, setVisible } = useModal(false);


    return (
        <div className={`h-screen w-full m-auto flex flex-col justify-center relative z-20`}>
            <div className={`h-full w-full absolute overflow-hidden top-0 left-0 z-10`}>
                <a onClick={() => setVisible(true)} className={`h-full w-full absolute top-0 left-0 block`}>
                    <div
                        className={`absolute top-0 right-0 bottom-0 left-[40px] w-[120px] h-[80px] ${style.modal} m-auto`}
                    >
                    </div>
                </a>
            </div>
            <div
                className={`h-full w-full absolute overflow-hidden top-0 left-0 z-0`}
            >
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/p6ff-ShY5Bw?autoplay=1&mute=1&loop=1&controls=0&disablekb=1"
                        title="YouTube video player" frameBorder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowFullScreen></iframe>
            </div>
            <Modal
                open={visible}
                onClose={() => setVisible(false)}
                width={`560px`}
                noPadding
            >
                <Modal.Body>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/p6ff-ShY5Bw"
                            title="YouTube video player" frameBorder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowFullScreen></iframe>
                </Modal.Body>
            </Modal>
        </div>
    )
}


const HomeCards = () => {
    return (
        <Card>
            <Card.Header css={{ position: "absolute", zIndex: 1, top: 5 }}>
                <Col>
                    <Text size={12} weight="bold" transform="uppercase" color="#ffffffAA">
                        New
                    </Text>
                    <Text h3 color="white">
                        Acme camera
                    </Text>
                </Col>
            </Card.Header>
            <Card.Image
                src="https://nextui.org/images/card-example-4.jpeg"
                objectFit="cover"
                width="100%"
                height={340}
                alt="Card image background"
            />
            <Card.Footer
                isBlurred
                css={{
                    position: "absolute",
                    bgBlur: "#ffffff66",
                    borderTop: "$borderWeights$light solid rgba(255, 255, 255, 0.2)",
                    bottom: 0,
                    zIndex: 1,
                }}
            >
                <Row>
                    <Col>
                        <Text color="#000" size={12}>
                            Available soon.
                        </Text>
                        <Text color="#000" size={12}>
                            Get notified.
                        </Text>
                    </Col>
                    <Col>
                        <Row justify="flex-end">
                            <Button flat auto rounded color="secondary">
                                <Text
                                    css={{ color: "inherit" }}
                                    size={12}
                                    weight="bold"
                                    transform="uppercase"
                                >
                                    Notify Me
                                </Text>
                            </Button>
                        </Row>
                    </Col>
                </Row>
            </Card.Footer>
        </Card>
    )
}


export default HomeComponent;