import {Button, Loading} from "@nextui-org/react";
import React from "react";

const LoadingButton = () => {
    return (
        <Button auto color="primary">
            <Loading type={"points-opacity"} color={"white"} size={"sm"} />
            <span className="ml-1">Loading</span>
        </Button>
    )
}

export default LoadingButton;