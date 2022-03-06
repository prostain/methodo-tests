import { render } from "@testing-library/react";
import Cart from "../../components/Cart";

let container: any;

beforeEach(() => {
    container = document.createElement("div");
    document.body.appendChild(container);
});

test("test cart display", () => {
    const { container } = render(<Cart setRoute={()=>{}} />);
    expect(container.querySelector('.homeLink')?.innerHTML).toBe('Retour');
});
