import {Button, Card, Col, Container, Grid, Link, Modal, Row, Spacer, Text, useModal} from "@nextui-org/react";
import React, { useRef, useState } from "react";
import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { ScrollToPlugin } from "gsap/ScrollToPlugin";
import style from "../../assets/css/Home.module.css";

gsap.registerPlugin(ScrollToPlugin);

const HomeComponent = () => {
    const [currentSection, setCurrentSection] = useState(0);
    const containerRef = React.useRef<HTMLDivElement>(null);
    const sectionRefs = useRef<Array<HTMLDivElement | null>>([]).current;
    const [navigating, setNavigating] = useState(false);

    const sections = [`landing`, `new-arrivals`, `popular-items`, `MovieModal`, `recommendations`, `commitments`];

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
            // ref={containerRef}
            // onWheel={scrollHandler}
            className={`max-h-screen max-w-screen overflow-y-scroll home-container`}
        >
            <HomeLanding  />
            <HomeNewArrivals />
            <HomePopularItems />
            <HomeMovieModal />
            <HomeRecommendations />
            <HomeCommitments />
        </div>
    )
}

const HomeLanding = () => {
    return (
        <div className={`h-screen w-4/5 m-auto flex justify-evenly items-center`}>
            <div>
                <Text h1 size={96}>Get Your Fresh Seafood</Text>
                <Text h4>Experience the Market's Freshest Fish at Your Convenience</Text>
                <Spacer y={1.5} />
                <Button size={"lg"} auto color="primary">Explore More</Button>
            </div>
            <div>
                <img src={"/assets/images/Home/landing.png"} alt={`Fishes`} />
            </div>
        </div>
    )
}

const HomeNewArrivals = () => {
    return (
        <div className={`h-screen w-4/5 m-auto flex flex-col justify-center`}>
            <Text h2 size={48}>New Arrivals</Text>
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
        <div className={`h-screen w-4/5 m-auto flex flex-col justify-center align-center`}>
            <Text h2 size={48} css={{"margin-bottom": 0}}>Popular Items</Text>
            <Text h4>The products that our customers loved</Text>
            <Spacer y={1.5} />
            <Grid.Container gap={2} justify={"center"}>
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
            <Spacer y={1.5} />
            <div className={"flex justify-center items-center"}>
                <Button size={"lg"}>View More Products</Button>
            </div>
            <Spacer y={10} />
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
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/p6ff-ShY5Bw?autoplay=1&mute=1&loop=1&controls=0&disablekb=1&showinfo=0&modestbranding=1&playsinline=1&enablejsapi=1"
                        title="YouTube video player" frameBorder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowFullScreen></iframe>
            </div>
            <Modal
                open={visible}
                onClose={() => setVisible(false)}
                width={`560px`}
                noPadding
                blur
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

const HomeRecommendations = () => {
    return (
        <div className={`h-screen w-4/5 m-auto flex flex-col justify-center`}>
            <Text h2>Recommendations</Text>
            <Spacer y={1.5} />
            <Container sm>
                <Row>
                    <Col>
                        <Text h3>Crab Recommendation</Text>
                        <p>We ensure that our Flower Crabs are freshly caught from the sea and immediately preserved under zero degrees Celsius to maintain their peak freshness.</p>
                    </Col>
                    <Col>
                        <img src={"https://images.chinatimes.com/newsphoto/2018-10-22/900/20181022004100.jpg"} alt={`Fishes`} />
                    </Col>
                </Row>
                <Row>
                    <Col>
                        <img src={`https://image-cdn-flare.qdm.cloud/q5569528cb69bc/image/cache/data/2019/07/12/465f12ad5000fd6dc542a8c18c87a0e9-max-w-1024.jpg`} alt={`Recommend`} />
                    </Col>
                    <Col>
                        <Text h3>Clam Recommendation</Text>
                        <p>Our abalone is renowned for its freshness and impressive size. Customers continually express their satisfaction with both the exceptional quality of our abalone and its reasonable price.</p>
                    </Col>
                </Row>
            </Container>
        </div>
    )
}

const HomeCommitments = () => {
    return (
        <div className={`h-screen w-screen m-auto flex flex-col justify-center`}>
            <Text h2>Our Commitments</Text>
            <Spacer y={1.5} />




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