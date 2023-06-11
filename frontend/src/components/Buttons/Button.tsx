import React, { FC } from "react";
import {Button, PressEvent} from "@nextui-org/react";

interface NormalButtonProps {
    text: string;
    onPressed: (event: PressEvent) => void;
}

const NormalButton: FC<NormalButtonProps> = ({ text, onPressed }) => {
    return (
        <Button onPress={onPressed}>
            { text }
        </Button>
    )
}

export default NormalButton;