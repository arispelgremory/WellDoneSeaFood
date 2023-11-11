import { Container, Text } from "@nextui-org/react"

interface BannerInterface {
    page: string,
}

const Banner = ({ page }: BannerInterface) => {
    return (
        <Container fluid className={"page-cover"} display="flex" alignItems="center" justify="center">
            <Text h2 size={60} className={"ml-12"}>{ page }</Text>
        </Container>
    )
}

export default Banner;