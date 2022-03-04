import { renderHook } from "@testing-library/react-hooks";
import useCart from "../../hooks/useCart";
import {setupServer} from "msw/node";
import {rest} from "msw";
import {mockedProduct, mockedProducts} from "../../mocks/mocks";
import {endpoint} from "../../App";

const server = setupServer(
    rest.get(`${endpoint}/cart`, (req, res, ctx) => {
        return res(ctx.json(mockedProducts))
    }),
    rest.delete(`${endpoint}/cart/20`, (req, res, ctx) => {
        return res(ctx.json({}));
    }),
)

beforeAll(() => server.listen());
afterEach(() => server.resetHandlers());
afterAll(() => server.close());

test("getCart", async () => {
    const { result } = renderHook(() => useCart());
    let loadingResult = await result.current.loadCart();
    expect(loadingResult).toEqual(true);
});

test("deleteProduct", async () => {
    const { result } = renderHook(() => useCart());
    let loadingResult = await result.current.removeToCart(mockedProduct);
    expect(loadingResult).toEqual(true);
});
