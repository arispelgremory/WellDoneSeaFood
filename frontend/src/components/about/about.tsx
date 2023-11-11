import { useRef, useState } from "react";
import Banner from "../shared/Banner";

const About = () => {
    const [currentSection, setCurrentSection] = useState(0);
    const containerRef = useRef<HTMLDivElement>(null);
    const sectionRefs = useRef<Array<HTMLDivElement | null>>([]).current;
    const [navigating, setNavigating] = useState(false);

    const sections = [`Vision`, `Mission`, `Objectives`, `Our Commitments`, ``];

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
        <>
            <Banner page={"About"} />
        </>
    )
};



export default About;