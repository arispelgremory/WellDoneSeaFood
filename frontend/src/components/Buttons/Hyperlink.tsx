import {Link} from "@nextui-org/react";
import {FC} from "react";

interface HyperlinkProps {
    text: string;
    url: string;
}

const Hyperlink: FC<HyperlinkProps> = ({text, url}) => {
    return (
        <>
            <Link href={url}>
                { text }
            </Link>
        </>
    )
}

export default Hyperlink;