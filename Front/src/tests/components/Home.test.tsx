import { render } from "@testing-library/react";
import Home from "../../components/Home";

let container: any;

beforeEach(() => {
    container = document.createElement("div");
    document.body.appendChild(container);
});

test("test home display", () => {
    const { container } = render(<Home setRoute={()=>{}} />);
    expect(container.querySelector('.cartLink')?.innerHTML).toBe('Aller sur panier');
});
