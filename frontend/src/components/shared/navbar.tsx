import { Navbar } from "@nextui-org/react";
import Logo from "../../assets/Logo.png";
import { useLocation } from "react-router-dom";

const Navigationbar = () => {
    const location = useLocation();

    console.log("render navbar");
    return (
        <Navbar>
            <Navbar.Brand>
                <img src={Logo} height={64} width={64} />
            </Navbar.Brand>
            <Navbar.Content activeColor={"primary"} variant={"default"}>
                <Navbar.Link href="/" isActive={location.pathname === "/"}>
                    Home
                </Navbar.Link>
                <Navbar.Link href="/shop" isActive={location.pathname === "/shop"}>
                    Shop
                </Navbar.Link>
                <Navbar.Link href="/about" isActive={location.pathname === "/about"}>
                    About
                </Navbar.Link>
                <Navbar.Link href="/contact" isActive={location.pathname === "/contact"}>
                    Contact
                </Navbar.Link>
            </Navbar.Content>
            <Navbar.Content>
                1
            </Navbar.Content>
        </Navbar>
    )

}

export default Navigationbar;