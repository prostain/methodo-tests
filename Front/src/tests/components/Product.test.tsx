import { render } from "@testing-library/react";
import Product from "../../components/Product";
import {mockedProduct} from "../../mocks/mocks";

let container: any;

beforeEach(() => {
    container = document.createElement("div");
    document.body.appendChild(container);
});

test("test product display", () => {
    const { container } = render(<Product  data={mockedProduct}/>);
    expect(container.querySelector('.productName')?.innerHTML).toBe('Figurine de Ants in my Eyes Johnson');
    expect(container.querySelector('.productQuantity')?.innerHTML).toBe('Quantitée 2');
});
