import { Row, Col, Text, Spacer, Card, Button, Container, Grid, Input, Dropdown, Checkbox } from "@nextui-org/react";
import { Key, useMemo, useState } from "react";
import Background from "../../assets/background.png";

const Shop = () => {
    return (
        <>
            <Banner />
            <Spacer y={3} />
            <ShopContainer />
        </>
    )
};

const Banner = () => {
    return (
        <Container fluid className={"page-cover"} display="flex" alignItems="center" justify="center">
            <Text h2 size={60} className={"ml-12"}>Seafood Shop</Text>
        </Container>
    )
}

const ShopContainer = () => {
    return (
        <Container fluid>
            <Row>
                <Col span={2}>
                    <ShopLeftBar />
                </Col>
                <Col span={10}>
                    <ShopItems />
                </Col>
            </Row>
        </Container>
    )
}

const ShopLeftBar = () => {
    const [sortBy, setSortBy] = useState<Set<Key>>(new Set(["featured"]));

    const selectedValue = useMemo(
        () => {
            Array.from(sortBy).join(", ").replaceAll("-", " ");
            // TODO: Call API

        }, 
        [sortBy]
    );

    const handleSelectionChange = (selection: any) => {
        // Assuming `selection` is a string or an array of strings, 
        // and you want to update your state to a new Set based on this
        setSortBy(new Set([selection]));
    };

    const DropdownList = {
        featured: "Featured",
        new_arrivals: "New Arrivals",
        low_to_high: "Price: Low to High",
        high_to_low: "Price: High to Low",
    }

    return (
        <>
            <Text h2 size={36}>Shop</Text>
            <Spacer y={2} />
            <Input clearable bordered label="Search" />
            <Spacer y={1.5} />
            <Text>Sort By</Text>
            <Spacer y={.25} />
            <Dropdown>
                <Dropdown.Button flat>{ sortBy }</Dropdown.Button>
                <Dropdown.Menu aria-label="Static Actions" selectionMode="single" selectedKeys={sortBy} onSelectionChange={handleSelectionChange} >
                    <Dropdown.Item key="featured">Featured</Dropdown.Item>
                    <Dropdown.Item key="new_arrivals">New Arrivals</Dropdown.Item>
                    <Dropdown.Item key="low_to_high">Price: Low to High</Dropdown.Item>
                    <Dropdown.Item key="high_to_low">Price: High to Low</Dropdown.Item>
                </Dropdown.Menu>
            </Dropdown>
            <Spacer y={1.5} />
            <Checkbox.Group
                color="secondary"
                defaultValue={["fish"]}
                label="Select Seafood Types"
                >
                <Checkbox value="fish">Fish</Checkbox>
                <Checkbox value="crab">Crab</Checkbox>
                <Checkbox value="prawn">Prawn</Checkbox>
                <Checkbox value="clam">Clam</Checkbox>
            </Checkbox.Group>
        </>
    )
}

const ShopItems = () => {
    return (
        <Grid.Container gap={2}>
            <Grid>
                <ShopCard />
            </Grid>
            <Grid>
                <ShopCard />
            </Grid>
            <Grid>
                <ShopCard />
            </Grid>
            <Grid>
                <ShopCard />
            </Grid>
            <Grid>
                <ShopCard />
            </Grid>

        </Grid.Container>
    )
}

const ShopCard = () => {
    return (
        <Card>
            <Card.Header css={{ position: "absolute", zIndex: 1, top: 5 }}>
                <Col>
                    {/* <Text size={12} weight="bold" transform="uppercase" color="#ffffffAA">
                        New
                    </Text> */}
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

export default Shop;